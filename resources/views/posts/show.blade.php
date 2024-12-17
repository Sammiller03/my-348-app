@extends('layouts.app')

@section('title', 'Post')

@section('content')

    <ul>
        <li>Title: {{ $post->title }}</li>
        <li>Content: {{ $post->content }}</li>
        <li>Comments:</li>
    <ul>

    <ul>
        @foreach ($post->comments as $comment)
            <li>{{ $comment->comment }}</li>
        @endforeach
    <ul>

@endsection

