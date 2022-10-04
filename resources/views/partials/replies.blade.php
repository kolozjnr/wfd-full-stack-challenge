@foreach($comments as $comment)
<div class="display-comment">
    <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->comment }}</p>
</div>
@endforeach 