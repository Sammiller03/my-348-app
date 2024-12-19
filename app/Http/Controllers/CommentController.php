<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment) //model binding
    {
        $response = Gate::inspect('update', $comment);

        if ($response->allowed()) {
            return view('comments.edit', ['comment' => $comment]);
        } else {
            return redirect()->route('posts.index')->with('message', $response->message());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'comment' => ['required', 'string', 'max:255',],
        ]);

        $comment->update($validatedData);

        return redirect()->route('posts.index')->with('message', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $response = Gate::inspect('delete', $comment);

        if ($response->allowed()) {
            $comment->delete();
            return redirect()->route('posts.index')->with('message', 'Comment was deleted.');
        } else {
            return redirect()->route('posts.index')->with('message', $response->message());
        }
    }
}
