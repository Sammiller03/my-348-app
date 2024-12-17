@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; background-color: #f9f9f9; padding: 20px;">

        <h1 style="font-size: 2rem; font-weight: bold; margin-bottom: 20px; text-align: center;">This is the list of posts:</h1>

        <ul style="list-style-type: none; padding: 0; width: 100%; max-width: 600px;">
            @foreach ($posts as $post)
                <!-- Post Content -->
                <li style="background: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 15px; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <a href="{{ route('users.show', ['user' => $post->user->id]) }}" style="font-weight: bold; color: #3490dc; text-decoration: none; display: block; margin-bottom: 8px;">
                        {{ $post->user->name }}
                    </a>
                    <p style="margin: 5px 0;"><strong>Title:</strong> {{ $post->title }}</p>
                    <p style="margin: 5px 0;"><strong>Content:</strong> {{ $post->content }}</p>

                    

                    <livewire:comments :post="$post" />
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
