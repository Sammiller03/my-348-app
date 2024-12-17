<div>
    <!-- Display Comments -->
    @foreach ($comments as $comment)
        <div class="comment">
            <p>{{ $comment->comment }}
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </p>
        </div>
    @endforeach

    <!-- Add New Comment Form -->
    <form wire:submit.prevent="addComment">
        <input type="text" wire:model="newComment" placeholder="Write a comment" />
        <button type="submit">Submit</button>
    </form>
</div>
