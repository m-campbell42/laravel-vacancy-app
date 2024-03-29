{{-- resources/views/vacancies/create.blade.php --}}
@extends('layouts.app')

@section('content')
<h1>Create a New Vacancy</h1>

<form method="POST" action="{{ route('vacancies.store') }}">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <button type="submit">Create Vacancy</button>
</form>
@endsection
