<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherProfile;

class TeacherController extends Controller
{
    //GET /api/v1/teachers/profile
    public function show() {
        $profile = Auth::user()->teacherProfile;
        if(!$profile) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Teacher profile not found',
                ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $profile,
        ]);

    }

    //pOST /api/v1/teachers/profile
    public function update(Request $request) {
        $data = $request->validate([
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'speciality' => 'nullable|string|max:255',
        ]);

        $profile = TeacherProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            $data
        );
        $profile->refresh();

        return response()->json([
            'status' => 'success',
            'message' => 'Teacher profile updated successfully',
            //'data' => $profile,
        ]);
    }

    //DELETE /api/v1/teachers/profile
    public function destroy() {
        $profile = Auth::user()->teacherProfile;
        if($profile) {
            $profile->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Teacher profile deleted successfully',
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Teacher profile not found',
        ], 404);
    }


    //get all teachers
    public function index() {
        $teachers = TeacherProfile::with('user')->get();
        return response()->json([
            'status' => 'success',
            'data' => $teachers,
        ]); 
    }


}
