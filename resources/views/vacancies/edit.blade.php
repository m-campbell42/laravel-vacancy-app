{{-- resources/views/vacancies/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<h1>Edit Vacancy</h1>

<form method="POST" action="{{ route('vacancies.update', $vacancy) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $vacancy->title }}" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ $vacancy->description }}</textarea>
    </div>
    <div>
        <label for="required_skills">Skills:</label>
        <textarea name="required_skills" id="required_skills" required>{{ $vacancy->required_skills }}</textarea>
    <div>
    <button type="submit">Update Vacancy</button>
</form>
@endsection
