<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseApiController extends Controller
{
    /**
     * GET /api/courses
     * Get all courses
     */
    public function index()
    {
        try {
            $courses = Course::where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->get();

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

    /**
     * GET /api/courses/{id}
     * Get single course
     */
    public function show($id)
    {
        try {
            $course = Course::find($id);

            if (!$course) {
                return response()->json([
                    'success' => false,
                    'message' => 'Course tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Detail course',
                'data' => $course
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data course',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * POST /api/courses
     * Create new course (Admin)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'icon' => 'required|string|max:100',
            'duration_weeks' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $course = Course::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Course berhasil dibuat',
                'data' => $course
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat course',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * PUT /api/courses/{id}
     * Update course (Admin)
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'description' => 'string',
            'category' => 'string|max:100',
            'icon' => 'string|max:100',
            'duration_weeks' => 'integer|min:1',
            'price' => 'numeric|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $course = Course::find($id);

            if (!$course) {
                return response()->json([
                    'success' => false,
                    'message' => 'Course tidak ditemukan'
                ], 404);
            }

            $course->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Course berhasil diupdate',
                'data' => $course
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal update course',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * DELETE /api/courses/{id}
     * Delete course (Admin)
     */
    public function destroy($id)
    {
        try {
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
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus course',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}