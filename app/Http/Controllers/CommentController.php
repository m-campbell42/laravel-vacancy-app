<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create(Vacancy $vacancy)
    {
        return view('comments.create', compact('vacancy'));
    }
    
    // Store a newly created comment in the database.
    public function store(Request $request, Vacancy $vacancy)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->user_id = auth()->id(); // assuming a logged-in user
        $comment->vacancy_id = $vacancy->id;
        $comment->save();

        return redirect()->route('vacancies.show', $vacancy);
    }
    public function destroy(Comment $comment)
    {
        
    }
    
}

