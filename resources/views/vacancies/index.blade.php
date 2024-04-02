{{-- resources/views/vacancies/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center pb-4">
        <h1 class="text-2xl font-semibold text-red-600">Vacancies</h1>
        <a href="{{ route('vacancies.create') }}" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">Post a New Vacancy</a>
    </div>
    
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @foreach ($vacancies as $vacancy)
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-lg font-bold text-red-600">{{ $vacancy->title }}</h2>
                <p class="text-gray-800">{{ $vacancy->description }}</p>
                <p class="text-gray-600">Skills: {{ $vacancy->required_skills }}</p>
                <div class="flex">
                    
                <a href="{{ route('vacancies.edit', $vacancy) }}" class="mt-2 px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white">Update</a>
                <form action="{{ route('vacancies.destroy', $vacancy) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this vacancy?')" class="mt-2 px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">Delete</button>
                </form>
                </div>
                <a href="{{ route('comments.create') }}" class="mt-2 px-4 py-2 bg-black hover:bg-gray-800 rounded-lg text-white">Add Comment</a>
            </div>
        @endforeach
    </div>
</div>
@endsection





