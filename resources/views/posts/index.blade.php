@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg">
        <a href="{{ route('posts.create' )}}">Create a Post</a>
    </div>

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 py-8">

        <h1 class="text-2xl font-bold mb-8 text-center pt-4">Posts:</h1>

        <ul class="w-full max-w-2xl space-y-6">
            @foreach ($posts as $post)
                <!-- post content -->
                <li class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg">

                    <!-- Delete Button -->
                     <div class="flex flex-col items-center justify-center">
                        <form  method="POST" 
                            action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit" 
                                class="text-sm bg-gray-500 hover:bg-red-500 text-white p-1 rounded">
                                Delete post
                            </button>
                        </form>
                    </div>

                    <a href="{{ route('users.show', ['user' => $post->user->id]) }}" class="text-indigo-600 font-semibold text-lg hover:underline">
                        {{ $post->user->name }}
                    </a>

                    <p class="mt-2"><strong>Title:</strong> {{ $post->title }}</p>
                    <p class="mt-1"><strong>Content:</strong> {{ $post->content }}</p>

                    <!-- this dynamically updates the comments section under a post using livewire Comments and comments.blade.php -->
                    <livewire:comments :post="$post" />
                </li>
            @endforeach
        </ul>

        <!-- pagination links -->
        {{ $posts->links() }}
    </div>
@endsection
