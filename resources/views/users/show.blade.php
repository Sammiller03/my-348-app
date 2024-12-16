@extends('layouts.app')

@section('title', $user->name . "'s Profile")

@section('content')
    <h1>{{ $user->name }}'s Profile</h1>

    <h2>Post History</h2>
    <ul>
        @forelse ($posts as $post)
            <li>
                <p>Title: {{ $post->title }}</p>
                <p>Content: {{ $post->content }}</p>
                <br>
            </li>
        @empty
            <p>No posts available.</p>
        @endforelse
    </ul>

    <h2>Comment History</h2>
    <ul>
        @forelse ($comments as $comment)
            <li>
                <p>{{ $comment->comment }}</p>
            </li>
        @empty
            <p>No comments available.</p>
        @endforelse
    </ul>
@endsection
