<?php

namespace App\Http\Controllers;
use App\Models\Thread;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Like::all();
        return view('like.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('like.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric'
        ]);

        $like = new Like();
        $like->user_id = $request->user_id;
        $like->save();

        return response()->redirectTo('/like');
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        return view('like.update', compact('like'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        $request->validate([
            'user_id' => 'required|numeric'
        ]);

        $like->user_id = $request->user_id;
        $like->save();

        return response()->redirectTo('/like');    }

    /**
     * Remove the specified resource from storage.
     */
    
}
