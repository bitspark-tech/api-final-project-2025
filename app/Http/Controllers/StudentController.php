<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentProfile;  

class StudentController extends Controller
{
    //GET /api/v1/students/profile

    public function show() {
        $profile = Auth::user()->studentProfile;
        if(!$profile) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Student profile not found',
                ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $profile,
        ]);
    }

    //POST /api/v1/students/profile
    public function update(Request $request) {
        $data = $request->validate([
            'dob' => 'required|date',
            'gender' => 'required|in:male, female',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $completed = !empty($data['dob']) && !empty($data['gender']);

        $profile = StudentProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            array_merge($data, ['is_completed' => $completed]),
        );
        $profile->refresh(); 
        return response()->json([
            'status' => 'success',
            'message' => 'Student profile updated successfully',
            //'data' => $profile,
        ]);

    }

}
