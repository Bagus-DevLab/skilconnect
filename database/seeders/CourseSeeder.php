<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ingin reset (opsional)
        // Course::truncate();

        $courses = [
            // 16 Kursus yang sudah ada
            [
                'title' => 'Fullstack Web Development',
                'category' => 'Programming',
                'duration' => '12 minggu',
                'participants' => 156,
                'price' => 750000,
                'icon_class' => 'fa-laptop-code'
            ],
            [
                'title' => 'UI/UX Design for Beginners',
                'category' => 'Design',
                'duration' => '8 minggu',
                'participants' => 234,
                'price' => 500000,
                'icon_class' => 'fa-paint-brush'
            ],
            [
                'title' => 'Digital Marketing Mastery',
                'category' => 'Marketing',
                'duration' => '6 minggu',
                'participants' => 189,
                'price' => 450000,
                'icon_class' => 'fa-bullhorn'
            ],
            [
                'title' => 'Data Science & Machine Learning',
                'category' => 'Data Science',
                'duration' => '10 minggu',
                'participants' => 145,
                'price' => 900000,
                'icon_class' => 'fa-chart-line'
            ],
            [
                'title' => 'Video Editing for Content Creator',
                'category' => 'Content Creation',
                'duration' => '4 minggu',
                'participants' => 267,
                'price' => 350000,
                'icon_class' => 'fa-video'
            ],
            [
                'title' => 'Cyber Security Fundamentals',
                'category' => 'Security',
                'duration' => '8 minggu',
                'participants' => 98,
                'price' => 650000,
                'icon_class' => 'fa-shield-alt'
            ],
            [
                'title' => 'Public Speaking & Communication',
                'category' => 'Soft Skills',
                'duration' => '3 minggu',
                'participants' => 312,
                'price' => 300000,
                'icon_class' => 'fa-microphone'
            ],
            [
                'title' => 'Microsoft Office Masterclass',
                'category' => 'Office Skills',
                'duration' => '2 minggu',
                'participants' => 445,
                'price' => 200000,
                'icon_class' => 'fa-file-excel'
            ],
            [
                'title' => 'Photography & Editing (Lightroom)',
                'category' => 'Photography',
                'duration' => '5 minggu',
                'participants' => 201,
                'price' => 400000,
                'icon_class' => 'fa-camera'
            ],
            [
                'title' => 'Analisis Jejaring Sosial',
                'category' => 'Data Analysis',
                'duration' => '8 minggu',
                'participants' => 87,
                'price' => 700000,
                'icon_class' => 'fa-project-diagram'
            ],
            [
                'title' => 'Integrasi Sistem',
                'category' => 'System Integration',
                'duration' => '10 minggu',
                'participants' => 76,
                'price' => 850000,
                'icon_class' => 'fa-cogs'
            ],
            [
                'title' => 'Pemrograman Perangkat Bergerak',
                'category' => 'Mobile Development',
                'duration' => '12 minggu',
                'participants' => 134,
                'price' => 950000,
                'icon_class' => 'fa-mobile-alt'
            ],
            [
                'title' => 'Pemrograman Web Lanjutan',
                'category' => 'Advanced Web',
                'duration' => '10 minggu',
                'participants' => 167,
                'price' => 800000,
                'icon_class' => 'fa-code'
            ],
            [
                'title' => 'Rekayasa Perangkat Lunak',
                'category' => 'Software Engineering',
                'duration' => '8 minggu',
                'participants' => 143,
                'price' => 750000,
                'icon_class' => 'fa-tools'
            ],
            [
                'title' => 'Teknik Pengambilan Keputusan',
                'category' => 'Decision Making',
                'duration' => '6 minggu',
                'participants' => 198,
                'price' => 550000,
                'icon_class' => 'fa-brain'
            ],
            [
                'title' => 'Belajar Digital Marketing',
                'category' => 'Marketing',
                'duration' => '8 minggu',
                'participants' => 289,
                'price' => 150000,
                'icon_class' => 'fa-bullhorn'
            ],

            // === 10 KURSUS BARU ===
            
            [
                'title' => 'Blockchain & Cryptocurrency Development',
                'category' => 'Blockchain',
                'duration' => '14 minggu',
                'participants' => 92,
                'price' => 1200000,
                'icon_class' => 'fa-bitcoin'
            ],
            [
                'title' => 'Cloud Computing dengan AWS',
                'category' => 'Cloud Computing',
                'duration' => '10 minggu',
                'participants' => 178,
                'price' => 950000,
                'icon_class' => 'fa-cloud'
            ],
            [
                'title' => 'Game Development dengan Unity',
                'category' => 'Game Development',
                'duration' => '16 minggu',
                'participants' => 145,
                'price' => 1100000,
                'icon_class' => 'fa-gamepad'
            ],
            [
                'title' => 'Artificial Intelligence & Deep Learning',
                'category' => 'AI & ML',
                'duration' => '14 minggu',
                'participants' => 103,
                'price' => 1300000,
                'icon_class' => 'fa-robot'
            ],
            [
                'title' => 'Copywriting & Content Writing',
                'category' => 'Writing',
                'duration' => '5 minggu',
                'participants' => 256,
                'price' => 400000,
                'icon_class' => 'fa-pen-fancy'
            ],
            [
                'title' => 'DevOps Engineering Bootcamp',
                'category' => 'DevOps',
                'duration' => '12 minggu',
                'participants' => 87,
                'price' => 1050000,
                'icon_class' => 'fa-server'
            ],
            [
                'title' => 'Graphic Design dengan Adobe Illustrator',
                'category' => 'Design',
                'duration' => '7 minggu',
                'participants' => 223,
                'price' => 550000,
                'icon_class' => 'fa-palette'
            ],
            [
                'title' => 'SEO & Google Ads Mastery',
                'category' => 'Digital Marketing',
                'duration' => '6 minggu',
                'participants' => 312,
                'price' => 500000,
                'icon_class' => 'fa-search'
            ],
            [
                'title' => 'Business Intelligence & Data Visualization',
                'category' => 'Data Analytics',
                'duration' => '9 minggu',
                'participants' => 134,
                'price' => 850000,
                'icon_class' => 'fa-chart-bar'
            ],
            [
                'title' => 'Project Management Professional (PMP)',
                'category' => 'Project Management',
                'duration' => '8 minggu',
                'participants' => 167,
                'price' => 750000,
                'icon_class' => 'fa-tasks'
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }

        $this->command->info('✅ Berhasil menambahkan ' . count($courses) . ' kursus ke database!');
    }
}