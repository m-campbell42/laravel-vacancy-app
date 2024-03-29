{{-- resources/views/vacancies/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div>
    <h1>{{ $vacancy->title }}</h1>
    <p>{{ $vacancy->description }}</p>

    @auth
    <!-- Add Comment Form -->
    <form method="POST" action="{{ route('comments.store', $vacancy) }}">
        @csrf
        <textarea name="content" required></textarea>
        <button type="submit">Add Comment</button>
    </form>
    @endauth

    @foreach ($vacancy->comments as $comment)
        <div>{{ $comment->content }}</div>
    @endforeach
</div>
@endsection

