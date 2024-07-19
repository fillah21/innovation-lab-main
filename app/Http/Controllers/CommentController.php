<?php

namespace App\Http\Controllers;
use App\Models\Thread;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::all();
        return view('pages.admin.comment.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('pages.admin.comment.create', compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'thread_id' => 'required|numeric',
            'content' => 'required|string',
        ]);

        $data['user_id'] = auth()->user()->id;

        Comment::create($data);
        return redirect()->route('thread.detail', $data['thread_id']);    
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $thread = Thread::findOrFail($comment->thread_id);

        return view('pages.detail', compact('comment', 'thread'));        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('pages.admin.comment.update', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'thread_id' => 'required|numeric',
            'content' => 'required|string',
        ]);

        $comment->update($request->all());
        return redirect()->route('comment.index');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }

    public function status(Comment $comment)
    {
        $comment->status = !$comment->status;
        $comment->save();
        return redirect()-> route('comment.index');
    }
}
