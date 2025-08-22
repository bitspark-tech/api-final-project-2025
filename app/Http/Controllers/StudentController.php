<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentProfile;  

class StudentController extends Controller
{
    //GET /api/v1/students/profile

   public function show($id = null){
        $user = Auth::user();

        if ($user->role === 'student') {
            // student sees their own profile
            $profile = $user->studentProfile;
        } elseif ($user->role === 'admin' && $id) {
            // admin sees any student's profile
            $profile = StudentProfile::where('user_id', $id)->first();
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Student profile not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $profile,
        ]);
    }

    public function update(Request $request, $id = null){
        $data = $request->validate([
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $completed = !empty($data['dob']) && !empty($data['gender']);
        $user = Auth::user();

        if ($user->role === 'student') {
            $profile = StudentProfile::updateOrCreate(
                ['user_id' => $user->id],
                array_merge($data, ['is_completed' => $completed])
            );
        } elseif ($user->role === 'admin' && $id) {
            $profile = StudentProfile::updateOrCreate(
                ['user_id' => $id],
                array_merge($data, ['is_completed' => $completed])
            );
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'You are not authorized to update this profile',
            ], 403);
        }

        $profile->refresh();

        return response()->json([
            'status' => 'success',
            'message' => 'Student profile updated successfully',
        ]);
    }
}
