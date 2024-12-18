@extends('layouts.app')

@section('title', 'Edit a Post')

@section('content')

    <form method="POST" action="{{ route('posts.update', $post) }}">

        @csrf
        @method("PUT")

        <!-- add old later in value next to $post->title etc. -->
        <p>Title: 
            <input 
                type="text" 
                name="title"
                value="{{ $post->title }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </p>

        <p>Content: 
            <input 
                type="text"
                name="content"
                value="{{ $post->content }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </p>

        <input type="submit" value="Update Post" class="bg-blue-500 text-black py-2 px-4 rounded hover:bg-blue-600 cursor-pointer">

        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>

@endsection
