<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Tampilkan daftar SEMUA kursus.
     * Return JSON jika request dari API, return View jika dari browser
     *
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $courses = Course::all();

        // Jika request minta JSON (dari Postman/API)
        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'message' => 'Data kursus berhasil diambil',
                'data' => $courses,
                'total' => $courses->count()
            ]);
        }

        // Jika request dari browser (return view)
        return view('courses.index', compact('courses'));
    }

    /**
     * Tampilkan detail kursus
     * Return JSON atau View
     */
    public function show(Request $request, $id)
    {
        // Coba cari by ID dulu, kalau ga ketemu coba by slug
        $course = Course::where('id', $id)
                       ->orWhere('slug', $id)
                       ->first();

        if (!$course) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kursus tidak ditemukan'
                ], 404);
            }
            abort(404);
        }

        // Return JSON atau View
        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'message' => 'Detail kursus berhasil diambil',
                'data' => $course
            ]);
        }

        return view('pages.course-detail', compact('course'));
    }

    /**
     * Store kursus baru
     * Return JSON atau Redirect
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'category' => ['required', 'string'],
                'duration' => ['required', 'string'],
                'price' => ['required', 'numeric', 'min:0'],
                'icon_class' => ['nullable', 'string'],
                'participants' => ['nullable', 'integer', 'min:0'],
            ]);

            $course = Course::create($validated);

            // Return JSON atau Redirect
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kursus berhasil dibuat',
                    'data' => $course
                ], 201);
            }

            return redirect()->route('admin.courses')
                           ->with('success', 'Kursus berhasil ditambahkan');

        } catch (\Exception $e) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan',
                    'error' => $e->getMessage()
                ], 500);
            }

            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Update kursus
     * Return JSON atau Redirect
     */
    public function update(Request $request, $id)
    {
        try {
            $course = Course::findOrFail($id);

            $validated = $request->validate([
                'title' => ['sometimes', 'string', 'max:255'],
                'category' => ['sometimes', 'string'],
                'duration' => ['sometimes', 'string'],
                'price' => ['sometimes', 'numeric', 'min:0'],
                'icon_class' => ['nullable', 'string'],
                'participants' => ['nullable', 'integer', 'min:0'],
            ]);

            $course->update($validated);

            // Return JSON atau Redirect
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kursus berhasil diupdate',
                    'data' => $course
                ]);
            }

            return redirect()->route('admin.courses')
                           ->with('success', 'Kursus berhasil diupdate');

        } catch (\Exception $e) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan',
                    'error' => $e->getMessage()
                ], 500);
            }

            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Delete kursus
     * Return JSON atau Redirect
     */
    public function destroy(Request $request, $id)
    {
        try {
            $course = Course::findOrFail($id);
            $courseName = $course->title;
            $course->delete();

            // Return JSON atau Redirect
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => "Kursus '{$courseName}' berhasil dihapus"
                ]);
            }

            return redirect()->route('admin.courses')
                           ->with('success', "Kursus '{$courseName}' berhasil dihapus");

        } catch (\Exception $e) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan',
                    'error' => $e->getMessage()
                ], 500);
            }

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Tampilkan halaman AI Course Recommendation
     */
    public function aiRecommendation()
    {
        return view('ai-recommendation');
    }

    /**
     * Generate rekomendasi kursus berdasarkan input user
     */
    public function generateRecommendation(Request $request)
    {
        $request->validate([
            'interest' => 'required|string',
            'experience' => 'required|in:beginner,intermediate,advanced',
            'goal' => 'required|string',
            'budget' => 'nullable|integer',
        ]);

        $courses = Course::all();

        // Filter berdasarkan level
        $levelFiltered = $courses->where('level', $request->experience);

        // Filter berdasarkan budget jika ada
        if ($request->budget) {
            $levelFiltered = $levelFiltered->where('price', '<=', $request->budget);
        }

        // Scoring algorithm sederhana
        $scoredCourses = $levelFiltered->map(function ($course) use ($request) {
            $score = 0;

            // Score based on interest
            $interest = strtolower($request->interest);
            $category = strtolower($course->category);

            if (str_contains($interest, $category) || str_contains($category, $interest)) {
                $score += 50;
            }

            // Score based on goal
            $goal = strtolower($request->goal);
            $description = strtolower($course->description ?? '');

            foreach (explode(' ', $goal) as $word) {
                if (strlen($word) > 3 && str_contains($description, $word)) {
                    $score += 10;
                }
            }

            // Popularitas
            $score += min(($course->students_count ?? 0) / 100, 20);

            // Skill match
            if ($course->skills) {
                foreach ($course->skills as $skill) {
                    if (
                        str_contains($interest, strtolower($skill)) ||
                        str_contains($goal, strtolower($skill))
                    ) {
                        $score += 15;
                    }
                }
            }

            $course->recommendation_score = $score;
            return $course;
        });

        // Sort & ambil 5 terbaik
        $recommendations = $scoredCourses->sortByDesc('recommendation_score')
            ->take(5)
            ->values();

        return response()->json([
            'success' => true,
            'recommendations' => $recommendations,
            'user_profile' => [
                'interest' => $request->interest,
                'experience' => $request->experience,
                'goal' => $request->goal,
                'budget' => $request->budget,
            ]
        ]);
    }

    /**
     * My Courses - untuk user yang login
     * Menampilkan kursus yang tersedia untuk didaftar
     */
    public function myCourses()
    {
        // Ambil semua kursus dari database, diurutkan berdasarkan kategori
        $availableCourses = Course::orderBy('category', 'asc')
                                  ->orderBy('title', 'asc')
                                  ->get();
        
        // TODO: Jika sudah ada sistem enrollment/pendaftaran user
        // $enrolledCourses = auth()->user()->enrollments()
        //                         ->with('course')
        //                         ->get();
        
        // Kirim data ke view
        return view('my-courses', compact('availableCourses'));
    }
}