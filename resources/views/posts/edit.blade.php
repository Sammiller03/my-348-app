@extends('layouts.app')

@section('title', 'Edit a Post')

@section('content')

    <form method="POST" action="{{ route('posts.update', $post) }}" class="ml-2 mt-2">

        @csrf
        @method("PUT")

        <p>Title: 
            <input 
                type="text" 
                name="title"
                value="{{ $post->title }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </p>

        <p class="mt-2">Content: 
            <input 
                type="text"
                name="content"
                value="{{ $post->content }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 mb-3"
            >
        </p>

        <input type="submit" value="Update Post" class="bg-blue-500 text-black py-2 px-4 rounded hover:bg-blue-600 cursor-pointer">

        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>

@endsection
