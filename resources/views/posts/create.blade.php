@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')

    <form method="POST" action="{{ route('posts.store') }}">

        @csrf

        <p>Title: <input 
            type="text" 
            name="title"
            value="{{ old('title') }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </p>

        <p>Content: <input 
            type="text" 
            name="content"
            value="{{ old('content') }}" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </p>

        <input type="submit" value="Submit" class="bg-blue-500 text-black py-2 px-4 rounded hover:bg-blue-600 cursor-pointer">

        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>

@endsection
