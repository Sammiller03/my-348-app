@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 py-8">

        <!-- create a post button -->
        <div class="flex justify-between items-start w-full px-4">
            <a href="{{ route('posts.create') }}" 
                class="font-semibold bg-indigo-600 hover:bg-indigo-800 text-white p-4 rounded">
                    Create a Post
            </a>
        </div>

        <h1 class="text-2xl font-bold mb-6 text-center pt-2">Posts:</h1>

        <ul class="w-full max-w-2xl space-y-6">
            @foreach ($posts as $post)

                <li class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg relative">
                    <!-- Flex Container for Buttons and Content -->
                    <div class="flex justify-between items-start">
                        <div>
                            <!-- User and Post Content (this is passing the id to users.show when could just be $user-->
                            <a href="{{ route('users.show', ['user' => $post->user->id]) }}"
                                class="text-indigo-600 font-semibold text-xl hover:underline">
                                    {{ $post->user->name }}
                            </a>
                            <p class="mt-3"><strong>Title:</strong> {{ $post->title }}</p>
                             <p class="mt-1"><strong>Content:</strong> {{ $post->content }}</p>
                        </div>

                        <!-- Buttons Section -->
                        <div class="flex space-x-2">
                            <!-- Edit Button -->
                            <a href="{{ route('posts.edit', $post) }}" 
                                class="text-sm bg-gray-500 hover:bg-blue-500 text-white p-1 rounded px-2 whitespace-nowrap">
                                Edit post
                            </a>
                            
                            <!-- Delete Button -->
                            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-sm bg-gray-500 hover:bg-red-500 text-white p-1 rounded px-2 whitespace-nowrap">
                                    Delete post
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- image here -->
                    @if ($post->image_path) 
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" style="max-width: 100%; height: auto;" class="mt-2 mb-3">
                    @endif

                    <!-- tags here -->
                    <p class="font-semibold mt-3">Tags:</p>
                    <div class="flex items-start mt-1 space-x-2">
                        @foreach ($post->tags as $tag)

                        <!-- prevents a weird null print -->
                            @if ($tag === null)
                                @break
                            @endif
                            @if (empty($tag))
                                @break
                            @endif

                            <p class="bg-gray-100 rounded p-1.5">{{ $tag->tagWord }}</p>
                        @endforeach
                    </div>

                    <!-- Comments Section -->
                    <livewire:comments :post="$post" />
                </li>

            @endforeach
        </ul>

        <!-- pagination links -->
        {{ $posts->links() }}
    </div>
@endsection
