<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    // Display a listing of the vacancies.
    public function index()
    {
        $vacancies = Vacancy::all(); // Fetch all vacancies
        return view('vacancies.index', compact('vacancies'));
    }

    // Show the form for creating a new vacancy.
    public function create()
    {
        return view('vacancies.create');
    }

    // Store a newly created vacancy in the database.
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'required_skills' => 'required',
        ]);

        $vacancy = new Vacancy($validatedData);
        $vacancy->user_id = auth()->id(); // assuming a logged-in user
        $vacancy->save();

        return redirect()->route('vacancies.index');
    }

    // Display the specified vacancy.
    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show', compact('vacancy'));
    }

    // Show the form for editing the specified vacancy.
    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit', compact('vacancy'));
    }

    // Update the specified vacancy in the database.
    public function update(Request $request, Vacancy $vacancy)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'required_skills' => 'required',
        ]);

        $vacancy->update($validatedData);
        return redirect()->route('vacancies.index');
    }

    // Remove the specified vacancy from the database.
    public function destroy(Vacancy $vacancy)
    {
        $vacancies = Vacancy::where('category', 'Laravel Developer')
        ->orWhere('title', 'LIKE', '%Laravel Developer%')
        ->get();

        return view('vacancies.index', compact('vacancies'));
    }
    
}
