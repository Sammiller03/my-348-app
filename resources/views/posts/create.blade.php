@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="ml-2 mt-2">

        @csrf

        <p>Title: <input 
            type="text" 
            name="title"
            value="{{ old('title') }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </p>

        <p class="mt-2">Content: <input 
            type="text" 
            name="content"
            value="{{ old('content') }}" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >
        </p>

        <p class="mt-2">Tags (optional, max 10 characters per tag):</p>
            <div class="mt-1">
                <input type="text" name="tags[]" value="{{ old('tags.0') }}" placeholder="Tag 1">
                <input type="text" name="tags[]" value="{{ old('tags.1') }}" placeholder="Tag 2">
                <input type="text" name="tags[]" value="{{ old('tags.2') }}" placeholder="Tag 3">
            </div>

        <p>Upload image: <input 
            type="file" 
            name="image"
            class="py-5"
             >
        </p>

        <input type="submit" value="Submit" class="bg-blue-500 text-white mt-6 py-2 px-4 rounded hover:bg-blue-600 cursor-pointer">

        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>

@endsection
