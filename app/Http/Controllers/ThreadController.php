<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Thread::all();
        return view('pages.admin.thread.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user =  User::all();
        $category = Category::all();
        return view('pages.admin.thread.create', compact("user","category"));
    }

    /**
     * Store a newly created resource in storage.
     */
   

    /**
     * Display the specified resource.
     */
    public function show(Thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        return view('pages.admin.thread.update', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|in:1,0'
        ]);
        $thread->update($request->all());
        return redirect()-> route('thread.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();
        return redirect()->back();
    }

    public function status(Thread $thread)
    {
        $thread->status = !$thread->status;
        $thread->save();
        return redirect()-> route('thread.index');
    }

    
}
