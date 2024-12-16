@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>This is the list of posts:</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('users.show', ['user' => $post->user->id]) }}">{{ $post->user->name }}</a> <!-- using queries to get the data here -->
                <p>Title: {{ $post->title }}</p>
                <p>Content: {{ $post->content }}</p>
            </li>
            <br> <!-- a break between each post-->
        @endforeach
    </ul>
@endsection
