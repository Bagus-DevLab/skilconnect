<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseApiController extends Controller
{
    // ===============================
    // GET /api/courses
    // ===============================
    public function index()
    {
        try {
            $courses = Course::orderBy('created_at', 'desc')->get();

            return response()->json([
                'success' => true,
                'message' => 'List of courses',
                'data' => $courses
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data courses',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // ===============================
    // GET /api/courses/{id}
    // ===============================
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $course
        ]);
    }

    // ===============================
    // POST /api/courses (ADMIN)
    // ===============================
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'category' => 'required|string',
            'duration' => 'required|integer',
            'participants' => 'required|integer',
            'price' => 'required|numeric',
            'icon_class' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $course = Course::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Course berhasil dibuat',
            'data' => $course
        ], 201);
    }

    // ===============================
    // PUT /api/courses/{id}
    // ===============================
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course tidak ditemukan'
            ], 404);
        }

        $course->update($request->only([
            'title',
            'category',
            'duration',
            'participants',
            'price',
            'icon_class'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Course berhasil diupdate',
            'data' => $course
        ]);
    }

    // ===============================
    // DELETE /api/courses/{id}
    // ===============================
    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course tidak ditemukan'
            ], 404);
        }

        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course berhasil dihapus'
        ]);
    }
}