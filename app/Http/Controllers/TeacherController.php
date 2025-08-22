<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherProfile;

class TeacherController extends Controller
{
    // GET api/v1/teachers/profile
    public function show($id = null)
    {
        $user = Auth::user();

        if ($user->role === 'teacher') {
            // teacher sees their own profile
            $profile = $user->teacherProfile;
        } elseif ($user->role === 'admin' && $id) {
            // admin sees any teacher's profile
            $profile = TeacherProfile::where('user_id', $id)->first();
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Teacher profile not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $profile,
        ]);
    }

    // POST ap/v1/teachers/profile
    public function update(Request $request, $id = null)
    {
        $data = $request->validate([
            'department' => 'nullable|string|max:255',
            'specialty' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        if ($user->role === 'teacher') {
            $profile = TeacherProfile::updateOrCreate(
                ['user_id' => $user->id],
                $data
            );
        } elseif ($user->role === 'admin' && $id) {
            $profile = TeacherProfile::updateOrCreate(
                ['user_id' => $id],
                $data
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
            'message' => 'Teacher profile updated successfully',
        ]);
    }

    // DELETE teacher profile (admin only)
    public function destroy($id)
    {
        $profile = TeacherProfile::where('user_id', $id)->first();

        if (!$profile) {
            return response()->json([
                'status' => 'error',
                'message' => 'Teacher profile not found',
            ], 404);
        }

        $profile->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Teacher profile deleted successfully',
        ]);
    }
}
