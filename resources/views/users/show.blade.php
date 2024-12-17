@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">

        <h1 class="text-xl font-bold pt-4">{{ $user->name }}'s Profile</h1>

        <h2 class="pt-4">Post History</h2>
        <ul class="w-full max-w-2xl space-y-6 pt-6">
            @forelse ($posts as $post)
                <!-- post history -->
                <li class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg">
                    <p class="mt-2"><strong>Title:</strong> {{ $post->title }}</p>
                    <p class="mt-1"><strong>Content:</strong> {{ $post->content }}</p>
                </li>
            @empty
                <p class="text-center text-gray-500">No post history</p>
            @endforelse
        </ul>

        <h2 class="pt-8">Comment History</h2>
        <ul class="w-full max-w-2xl space-y-6 pt-6 mb-4">
            @forelse ($comments as $comment)
                <!-- comment history -->
                <li class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg">
                    <p class="mt-2">{{ $comment->comment }} on: {{ $comment->post->user->name }}'s post</p>
                </li>
            @empty
                <p class="text-center text-gray-500">No comment history</p>
            @endforelse
        </ul>
    <div>
@endsection
