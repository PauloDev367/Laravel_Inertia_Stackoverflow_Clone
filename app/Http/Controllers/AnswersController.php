<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Question $question, Request $request)
    {
        $question->answers()
            ->create(
                $request->validate([
                    'body' => 'required'
                ]) + ['user_id' => Auth::id()]
            );

        return back()->with('success', 'Your answer has been submitted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);

        return view('answers.edit', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Question $question, Request $request, Answer $answer)
    {
        $this->authorize('update', $answer);
        $answer->update($request->validate([
            'body' => 'required',
        ]));

        return redirect()
            ->route('questions.show', $question->slug)
            ->with('success', 'Your answer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('delete', $answer);
        $answer->delete();

        return back()
            ->with('success', 'Your answer has been removed');
    }
}
