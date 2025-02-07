<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:posts,title',],
            'content' => ['required', 'string', 'max:2000',],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags.*' => ['nullable', 'string', 'max:10', 'distinct'],
        ]);

        //Handle Image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        //Create the Post
        $p = new Post;
        $p->title = $validatedData['title'];
        $p->content = $validatedData['content'];
        $p->image_path = $imagePath;
        $p->user_id = auth()->id();
        $p->save();
        

        //Add tags if any
        //Maps each tag word id to $tagIds creates a new tag if no already exists
        if (!empty($validatedData['tags'])) {
            $tagIds = collect($validatedData['tags'])
                ->filter(function ($tagWord) {
                    return !is_null($tagWord); // filter out null tags
                })
                ->map(function ($tagWord) {
                    return Tag::firstOrCreate(['tagWord' => $tagWord])->id;
                });
        
            $p->tags()->attach($tagIds);
        }
        
        return redirect()->route('posts.index')->with('message', 'You created a Post!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //edit comes before update
        //handle the authorization in here
        $response = Gate::inspect('update', $post);

        if ($response->allowed()) {
            return view('posts.edit', ['post' => $post]);
        } else {
            return redirect()->route('posts.index')->with('message', $response->message());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255',],
            'content' => ['required', 'string', 'max:2000',],
        ]);

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('message', 'Post updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $response = Gate::inspect('delete', $post);

        if ($response->allowed()) {
            $post->delete();
            return redirect()->route('posts.index')->with('message', 'Post was deleted.');
        } else {
            return redirect()->route('posts.index')->with('message', $response->message());
        }
    }
}
