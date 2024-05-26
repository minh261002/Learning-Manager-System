<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }
    public function getQuestionByLecture(Request $request)
    {
        $course_lecture_id = $request->course_lecture_id;
        $questions = $this->question
            ->where('course_lecture_id', $course_lecture_id)
            ->with('user')
            ->with('answers')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'questions' => $questions
        ]);
    }

    public function createQuestion(Request $request)
    {
        $request->validate([
            'course_lecture_id' => 'required',
            'question' => 'required'
        ]);

        $question = $this->question->create([
            'user_id' => auth()->id(),
            'course_lecture_id' => $request->course_lecture_id,
            'instructor_id' => $request->instructor_id,
            'question' => $request->question,
            'title' => $request->title,
        ]);

        return response()->json([
            'status' => 'success',
            'question' => $question
        ]);
    }
}
