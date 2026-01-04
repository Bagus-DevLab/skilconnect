<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ==================== DASHBOARD ====================
    public function dashboard()
    {
        $stats = [
            'total_courses' => Course::count(),
            'total_contacts' => Contact::count(),
            'total_users' => User::count(),
            'new_contacts' => Contact::where('status', 'new')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    // ==================== COURSES CRUD ====================
    public function courses()
    {
        $courses = Course::latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function createCourse()
    {
        return view('admin.courses.create');
    }

    public function storeCourse(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'duration' => 'required|string|max:50',
            'participants' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'icon_class' => 'nullable|string|max:50',
        ]);

        Course::create($validated);

        return redirect()->route('admin.courses')->with('success', 'Kursus berhasil ditambahkan!');
    }

    public function editCourse(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function updateCourse(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'duration' => 'required|string|max:50',
            'participants' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'icon_class' => 'nullable|string|max:50',
        ]);

        $course->update($validated);

        return redirect()->route('admin.courses')->with('success', 'Kursus berhasil diperbarui!');
    }

    public function destroyCourse(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses')->with('success', 'Kursus berhasil dihapus!');
    }

    // ==================== CONTACTS CRUD ====================
    public function contacts()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function showContact(Contact $contact)
    {
        // Update status menjadi 'read' saat dilihat
        if ($contact->status === 'new') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function updateContactStatus(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied'
        ]);

        $contact->update($validated);

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    public function destroyContact(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts')->with('success', 'Pesan berhasil dihapus!');
    }

    // ==================== USERS MANAGEMENT ====================
    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function destroyUser(User $user)
    {
        // Jangan bisa hapus diri sendiri
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus!');
    }
}