@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')

    <form method="POST" action="{{ route('comments.update', $comment) }}" class="ml-2 mt-2">

        @csrf
        @method("PUT")

        <p>Comment: 
            <input 
                type="text" 
                name="comment"
                value="{{ $comment->comment }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 mb-3"
            >
        </p>

        <input type="submit" value="Update Comment" class="bg-blue-500 text-black py-2 px-4 rounded hover:bg-blue-600 cursor-pointer">

        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>

@endsection