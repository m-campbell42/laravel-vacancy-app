{{-- resources/views/comments/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Comment to {{ $vacancy->title }}</h1>
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Comment:</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
        <a href="{{ route('vacancies.index') }}" class="mt-2 px-4 py-2 bg-black hover:bg-gray-800 rounded-lg text-white">Add Comment</a>
    </form>
</div>
@endsection
