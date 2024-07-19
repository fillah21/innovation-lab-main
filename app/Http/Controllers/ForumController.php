<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function show(Request $request)
    {   

        $thread = Thread::latest()->filter(request(['search']))->Category(request(['category_id']))->get();

        return view('pages.forum', compact('thread'));
    }

    public function thread(Request $request)
    {
        
        return view('pages.thread-create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $data['user_id'] = auth()->user()->id;
        

        Thread::create($data);
        return redirect()->route('forum');
    }

    public function showThreadDetail(Thread $thread)
    {
        $thread->load(['comments' => function($query){
            $query->latest();
        }]);

        return view('pages.detail', compact('thread'));
    }



    public function like(Thread $thread)
    {
        $data = [
            'thread_id'=>$thread->id,
            'user_id' => Auth::user()->id
        ];

        $like = Like::where($data);
        if ($like->count() > 0) {
            $like->delete();
        } else {
            Like::create($data);
        }

        return redirect()->back();
        
    }

    public function destroyThread(Thread $thread)
    {
        $thread->delete();
        return redirect()->route('forum');
    }
    
    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }

    public function editThread(Request $request, Thread $thread)
    {
        $request->validate([
        'editedContent' => 'required|string',
        ]);

        if (auth()->user() && auth()->user()->id == $thread->user_id) {
            $thread->update([
            'content' => $request->input('editedContent'),
        ]);
    }

        return redirect()->back(); 
    }

    public function storeComment(Request $request)
    {
        $data = $request->validate([
            'thread_id' => 'required|numeric',
            'content' => 'required|string',
        ]);

        $data['user_id'] = auth()->user()->id;

        Comment::create($data);
        return redirect()->route('thread.detail', $data['thread_id']);    
    }

    public function editComment(Request $request, Comment $comment)
    {
        $request->validate([
        'editedContent' => 'required|string',
        ]);

        if (auth()->user() && auth()->user()->id == $comment->user_id) {
            $comment->update([
            'content' => $request->input('editedContent'),
        ]);

            return redirect()->back(); 
        }
    }

}
