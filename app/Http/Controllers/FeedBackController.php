<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedBack;
use App\Models\StudentProfile;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class FeedBackController extends Controller
{    //student feedback submission
    public function store(Request $request ) {
        $data = $request->validate([
            'enrollment_id' => 'required|integer|exists:enrollments,id',
            'message' => 'required|string|max:300',
            'rating' => 'nullable|integer|min:1',
        ]);
        $student = Auth::user()->studentProfile;

        if (!$student || !$student->is_completed) {
            return response()->json([
                'status' => 'error',
                'message' => 'complete your profile'
            ]);
        }
        $enrollment = Enrollment::where('id', $data['enrollment_id'])->where('user_id', $student->id)->first();
        if (!$enrollment){
            return response()->json([
                'status' => 'error',
                'message' => 'you are not enrolled into this course',
            ]);
        
        }
        if (Feedback::where('enrollment_id', $enrollment->id)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already submitted a feedback',
            ],409);
            
        }

        $feedback = Feedback::create([
            'enrollment_id' => $enrollment->id,
            'message' => $data['message'],
            'rating' => $data['rating'] ?? null,
        ]);
        
        return response()->json([
            'status' => 'success',
            'message' => 'feedback submitted successfully',
            'data' => $feedback,
        ]);
    }

    // admin views all feedbacks

    public function index() {
        $user = Auth::user();
        $user->role === 'admin';
        return FeedBack::all();
    }
    public function show($id = null){
        //teacher sees feedbacks
        $user = Auth::user();
        $user->role === 'teacher';
        return Feedback::findOrFail($id);
    }

            
         

    


}
