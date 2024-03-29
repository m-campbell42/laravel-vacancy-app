{{-- resources/views/comments/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Comment to "{{ $vacancy->title }}"</h1>
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Comment:</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>
</div>
@endsection
