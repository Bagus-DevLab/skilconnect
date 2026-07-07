<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lesson;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Gambar yang sudah ada di storage
        $imgs = [
            'courses/DfnryADFrWYSVOUCFEwIpF975s87AmKaUQPiywgD.png',
            'courses/LTFzjMk5xOMXl5MrjBQqeioTHBRxkPKJFaUzCH6u.png',
            'courses/MRV7r04zBa1VrMiJ259VxBROLjtqJWyo6uXRaOFy.png',
            'courses/TsX6uY0wdvJLWEl84X0UzM2RiO6CHAn0dQESGCvD.png',
            'courses/VV1PMnqXVfI1y3VPdaTRbirS5MTLT5oCIZAGszfM.jpg',
            'courses/X2aonkkDvTuxg9e3cTBfDnphD3tBG4M73Fk7aIY4.jpg',
            'courses/YtH6qzmaXRzKdpvGI2j4t5gdsSR9O6nzKpFlQ3Pv.png',
            'courses/z4rMyeMj5oFqUeeDXacGFmAUZDIcMkLNCxYl4d3s.png',
        ];

        $courses = [
            // ── KURSUS LAMA ─────────────────────────────────────────────────
            [
                'title' => 'Flutter Development untuk Pemula',
                'category' => 'Programming',
                'description' => 'Belajar membangun aplikasi mobile cross-platform menggunakan Flutter dan Dart dari nol hingga mahir.',
                'price' => 250000, 'duration' => 8, 'rating' => 4.80,
                'students_count' => 120, 'difficulty_level' => '1',
                'image' => $imgs[0],
                'lessons' => [
                    ['title' => 'Pengenalan Flutter & Instalasi', 'desc' => 'Mengenal Flutter dan cara instalasi environment development',
                     'content' => "Flutter adalah framework UI open-source dari Google untuk membangun aplikasi native yang indah.\n\nPada materi ini Anda akan belajar:\n• Apa itu Flutter dan keunggulannya\n• Cara instalasi Flutter SDK\n• Setup Android Studio / VS Code\n• Membuat project Flutter pertama\n\nFlutter menggunakan bahasa Dart yang mudah dipelajari. Dengan satu kode, Anda bisa deploy ke Android, iOS, Web, dan Desktop."],
                    ['title' => 'Dasar-Dasar Bahasa Dart', 'desc' => 'Mempelajari sintaks dan fitur bahasa pemrograman Dart',
                     'content' => "Dart adalah bahasa pemrograman yang dioptimalkan untuk membangun aplikasi UI.\n\nMateri yang dipelajari:\n• Variabel dan tipe data\n• Fungsi dan parameter\n• Class dan OOP\n• List, Map, dan Set\n• Null safety di Dart\n\nDart sangat mirip dengan Java dan JavaScript sehingga mudah dipelajari bagi yang sudah mengenal keduanya."],
                    ['title' => 'Widget Dasar di Flutter', 'desc' => 'Mengenal widget Container, Text, Row, Column, dan Stack',
                     'content' => "Widget adalah blok bangunan dasar dari UI Flutter. Semua yang terlihat di layar adalah widget.\n\nWidget yang dipelajari:\n• Container & DecoratedBox\n• Text & RichText\n• Row & Column\n• Stack & Positioned\n• Image & Icon\n• Padding & Margin\n\nIngat: 'Everything is a Widget' di Flutter!"],
                    ['title' => 'State Management dengan Provider', 'desc' => 'Mengelola state aplikasi menggunakan package Provider',
                     'content' => "State Management adalah cara mengelola data yang dapat berubah dalam aplikasi Flutter.\n\nPada materi ini:\n• Memahami Stateful vs Stateless Widget\n• Menggunakan setState()\n• Implementasi Provider pattern\n• ChangeNotifier dan Consumer\n• Memisahkan logic dari UI\n\nProvider adalah cara yang direkomendasikan Google untuk state management di Flutter."],
                    ['title' => 'Navigasi & Routing', 'desc' => 'Berpindah halaman dengan Navigator dan named routes',
                     'content' => "Navigasi adalah cara pengguna berpindah antar halaman dalam aplikasi.\n\nMateri navigasi:\n• Navigator.push() dan Navigator.pop()\n• Named routes\n• Passing data antar halaman\n• Bottom navigation bar\n• Tab bar navigation\n\nMemahami navigasi sangat penting untuk membangun aplikasi multi-halaman."],
                    ['title' => 'HTTP Request & REST API', 'desc' => 'Mengambil data dari server menggunakan package http',
                     'content' => "Hampir semua aplikasi mobile butuh berkomunikasi dengan server.\n\nMateri HTTP:\n• Package http dan dio\n• GET dan POST request\n• Parsing JSON response\n• FutureBuilder widget\n• Error handling\n• Authentication dengan token\n\nDengan memahami HTTP request, Anda bisa menghubungkan app Flutter ke backend manapun."],
                    ['title' => 'Proyek Akhir: Aplikasi E-Commerce', 'desc' => 'Membangun aplikasi e-commerce sederhana secara end-to-end',
                     'content' => "Proyek akhir menggabungkan semua materi yang telah dipelajari.\n\nFitur yang dibangun:\n• Halaman login & register\n• List produk dari API\n• Detail produk\n• Keranjang belanja\n• State management dengan Provider\n• Navigasi lengkap\n\nSetelah menyelesaikan proyek ini, Anda siap membangun aplikasi Flutter secara mandiri!"],
                ],
            ],
            [
                'title' => 'Laravel untuk Backend API',
                'category' => 'Programming',
                'description' => 'Kuasai pembuatan REST API profesional menggunakan Laravel, lengkap dengan autentikasi, validasi, dan database relationship.',
                'price' => 300000, 'duration' => 10, 'rating' => 4.90,
                'students_count' => 95, 'difficulty_level' => '3',
                'image' => $imgs[1],
                'lessons' => [
                    ['title' => 'Pengenalan Laravel & MVC', 'desc' => 'Memahami konsep MVC dan struktur project Laravel',
                     'content' => "Laravel adalah framework PHP paling populer dengan sintaks yang elegan dan ekspresif.\n\nMVC Pattern:\n• Model - Berinteraksi dengan database\n• View - Menampilkan data ke user\n• Controller - Logika bisnis\n\nKami akan memulai dari instalasi Laravel menggunakan Composer dan membuat project pertama."],
                    ['title' => 'Routing & Middleware', 'desc' => 'Mendefinisikan route dan membuat middleware custom',
                     'content' => "Routing menentukan URL mana yang ditangani oleh controller mana.\n\nMateri routing:\n• Basic routing (GET, POST, PUT, DELETE)\n• Route parameters\n• Named routes\n• Route groups\n• Middleware dan cara kerja\n• Auth middleware\n\nMiddleware sangat berguna untuk autentikasi dan otorisasi request."],
                    ['title' => 'Eloquent ORM & Migration', 'desc' => 'Bekerja dengan database menggunakan Eloquent',
                     'content' => "Eloquent ORM membuat interaksi dengan database menjadi sangat mudah.\n\nTopik yang dibahas:\n• Migration untuk versi kontrol database\n• Model dan tabel database\n• CRUD dengan Eloquent\n• Query builder\n• Relationship: hasOne, hasMany, belongsTo\n• Eager loading vs lazy loading\n\nEloquent adalah salah satu fitur terbaik Laravel."],
                    ['title' => 'Membuat REST API CRUD', 'desc' => 'Membangun endpoint API lengkap dengan resource controller',
                     'content' => "REST API adalah cara standar untuk komunikasi antara frontend dan backend.\n\nImplementasi API:\n• Resource controller\n• API Resource untuk format response\n• Pagination\n• Filtering dan sorting\n• File upload via API\n• API documentation\n\nKita akan membangun API manajemen produk yang lengkap."],
                    ['title' => 'Autentikasi dengan Laravel Sanctum', 'desc' => 'Mengamankan API dengan token-based authentication',
                     'content' => "Laravel Sanctum menyediakan autentikasi ringan untuk SPA dan mobile apps.\n\nImplementasi Sanctum:\n• Instalasi dan konfigurasi\n• Login dan register endpoint\n• Token generation\n• Protected routes dengan auth:sanctum\n• Logout dan revoke token\n• Role-based access control\n\nSanctum sangat cocok untuk proyek mobile app."],
                ],
            ],
            [
                'title' => 'UI/UX Design Fundamentals',
                'category' => 'Design',
                'description' => 'Pelajari prinsip-prinsip dasar desain antarmuka dan pengalaman pengguna menggunakan Figma.',
                'price' => 200000, 'duration' => 6, 'rating' => 4.70,
                'students_count' => 150, 'difficulty_level' => '1',
                'image' => $imgs[2],
                'lessons' => [
                    ['title' => 'Pengantar UI vs UX Design', 'desc' => 'Memahami perbedaan fundamental UI dan UX',
                     'content' => "UI (User Interface) dan UX (User Experience) adalah dua hal yang berbeda namun saling berkaitan.\n\nUI Design:\n• Tampilan visual (warna, font, ikon)\n• Layout dan komposisi\n• Desain komponen\n\nUX Design:\n• Alur pengguna (user flow)\n• Riset pengguna\n• Usability testing\n• Information architecture\n\nDesigner yang baik menguasai keduanya!"],
                    ['title' => 'Pengenalan Figma', 'desc' => 'Menguasai tools dan fitur Figma untuk desain UI',
                     'content' => "Figma adalah tools desain kolaboratif berbasis cloud yang paling populer saat ini.\n\nFitur Figma yang dipelajari:\n• Frame dan Layer\n• Component dan Variants\n• Auto Layout\n• Prototyping dasar\n• Collaboration features\n• Plugin berguna\n\nFigma gratis untuk penggunaan individu dan sangat powerful."],
                    ['title' => 'Color Theory & Typography', 'desc' => 'Teori warna dan pemilihan tipografi yang efektif',
                     'content' => "Warna dan tipografi adalah elemen paling berpengaruh dalam desain visual.\n\nColor Theory:\n• Color wheel dan harmoni warna\n• Primary, secondary, tertiary colors\n• Contrast ratio untuk aksesibilitas\n• Membuat color palette yang konsisten\n\nTypography:\n• Serif vs Sans-serif\n• Font pairing\n• Hierarchy dengan ukuran dan weight\n• Line height dan letter spacing"],
                    ['title' => 'Membuat Design System', 'desc' => 'Membangun sistem desain yang konsisten dan scalable',
                     'content' => "Design System adalah kumpulan komponen, guideline, dan aset yang digunakan secara konsisten.\n\nKomponen Design System:\n• Color palette\n• Typography scale\n• Spacing system\n• Button variants\n• Form elements\n• Card components\n\nDesign system memastikan konsistensi di seluruh produk digital."],
                    ['title' => 'Prototype & User Testing', 'desc' => 'Membuat prototype interaktif dan melakukan user testing',
                     'content' => "Prototype memungkinkan kita menguji desain sebelum development dimulai.\n\nPrototyping di Figma:\n• Interactive connections\n• Animations dan transitions\n• Smart animate\n• Scrolling prototype\n\nUser Testing:\n• Metode usability testing\n• Mengidentifikasi pain points\n• Iterasi berdasarkan feedback\n\nTest early, test often adalah prinsip UX yang baik."],
                ],
            ],
            [
                'title' => 'JavaScript Modern (ES6+)',
                'category' => 'Programming',
                'description' => 'Mendalami fitur-fitur modern JavaScript termasuk async/await, destructuring, modules, dan banyak lagi.',
                'price' => 180000, 'duration' => 6, 'rating' => 4.60,
                'students_count' => 200, 'difficulty_level' => '2',
                'image' => $imgs[3],
                'lessons' => [
                    ['title' => 'ES6 Dasar: let, const, dan Arrow Function', 'desc' => 'Fitur fundamental ES6 yang wajib dikuasai',
                     'content' => "ES6 (ECMAScript 2015) membawa banyak perubahan signifikan pada JavaScript.\n\nFitur yang dipelajari:\n• let dan const (block scoping)\n• Template literals\n• Arrow function dan this binding\n• Default parameter\n• Rest dan spread operator\n• Destructuring assignment\n\nSemua kode JavaScript modern menggunakan fitur-fitur ini."],
                    ['title' => 'Array Methods Modern', 'desc' => 'map, filter, reduce, dan array methods lainnya',
                     'content' => "JavaScript modern memiliki banyak array methods yang powerful.\n\nArray methods yang wajib tahu:\n• map() - transformasi array\n• filter() - menyaring elemen\n• reduce() - mengakumulasi nilai\n• find() dan findIndex()\n• some() dan every()\n• flat() dan flatMap()\n• Array.from() dan spread\n\nDengan array methods, kode menjadi lebih bersih dan fungsional."],
                    ['title' => 'Promise & Async/Await', 'desc' => 'Menangani operasi asynchronous dengan elegan',
                     'content' => "JavaScript bersifat single-threaded, sehingga operasi asynchronous sangat penting.\n\nEvolution of async:\n• Callback hell (masalah lama)\n• Promise: .then() dan .catch()\n• async/await: kode sync-like\n• Promise.all() dan Promise.race()\n• Error handling dengan try/catch\n\nAsync/await membuat kode asynchronous mudah dibaca seperti kode synchronous biasa."],
                    ['title' => 'Module System & Import/Export', 'desc' => 'Mengorganisir kode dengan ES6 Modules',
                     'content' => "ES6 Modules memungkinkan kita memecah kode menjadi file-file terpisah yang dapat diimport.\n\nModule syntax:\n• export dan export default\n• import named dan default\n• Dynamic import()\n• Module bundlers (Webpack, Vite)\n• CommonJS vs ES Modules\n\nModule system adalah fondasi dari framework modern seperti React, Vue, dan Angular."],
                ],
            ],
            [
                'title' => 'Machine Learning untuk Pemula',
                'category' => 'Data Science',
                'description' => 'Pengenalan konsep dasar machine learning, algoritma populer, dan implementasi menggunakan Python.',
                'price' => 350000, 'duration' => 12, 'rating' => 4.85,
                'students_count' => 80, 'difficulty_level' => '4',
                'image' => $imgs[4],
                'lessons' => [
                    ['title' => 'Pengenalan Machine Learning', 'desc' => 'Konsep dasar, jenis ML, dan pipeline data science',
                     'content' => "Machine Learning adalah cabang AI yang memungkinkan komputer belajar dari data.\n\nJenis Machine Learning:\n• Supervised Learning (belajar dari data berlabel)\n• Unsupervised Learning (menemukan pola)\n• Reinforcement Learning (belajar dari reward)\n\nData Science Pipeline:\n1. Pengumpulan data\n2. Preprocessing & EDA\n3. Pemilihan model\n4. Training & evaluasi\n5. Deployment"],
                    ['title' => 'Python untuk Data Science', 'desc' => 'NumPy, Pandas, dan Matplotlib untuk analisis data',
                     'content' => "Python adalah bahasa pemrograman paling populer untuk data science.\n\nLibrary yang dipelajari:\n• NumPy - komputasi numerik\n• Pandas - manipulasi data (DataFrame)\n• Matplotlib & Seaborn - visualisasi\n• Scikit-learn - machine learning\n\nPraktik langsung:\n• Membaca dataset CSV\n• Cleaning data\n• Eksplorasi statistik\n• Visualisasi distribusi data"],
                    ['title' => 'Supervised Learning: Regresi & Klasifikasi', 'desc' => 'Algoritma Linear Regression dan Logistic Regression',
                     'content' => "Supervised Learning menggunakan data berlabel untuk melatih model.\n\nAlgoritma yang dipelajari:\n• Linear Regression (prediksi harga rumah)\n• Logistic Regression (klasifikasi email spam)\n• Decision Tree\n• Random Forest\n• Support Vector Machine\n\nProses training:\n1. Split data train/test\n2. Fit model ke data train\n3. Predict pada data test\n4. Evaluasi performa"],
                    ['title' => 'Evaluasi & Tuning Model', 'desc' => 'Mengukur dan meningkatkan performa model ML',
                     'content' => "Evaluasi model sangat penting untuk memastikan model bekerja dengan baik.\n\nMetrik evaluasi:\n• Accuracy, Precision, Recall\n• F1-Score\n• Confusion Matrix\n• ROC-AUC Curve\n• MSE dan RMSE (regresi)\n\nTeknik peningkatan model:\n• Cross-validation\n• Hyperparameter tuning\n• Grid Search\n• Regularization (L1/L2)\n• Feature selection"],
                ],
            ],
            [
                'title' => 'Digital Marketing Strategy',
                'category' => 'Marketing',
                'description' => 'Strategi pemasaran digital lengkap mencakup SEO, social media marketing, content marketing, dan analitik.',
                'price' => 150000, 'duration' => 5, 'rating' => 4.50,
                'students_count' => 175, 'difficulty_level' => '1',
                'image' => $imgs[5],
                'lessons' => [
                    ['title' => 'Ekosistem Digital Marketing', 'desc' => 'Memahami channel dan strategi pemasaran digital',
                     'content' => "Digital marketing mencakup berbagai channel untuk menjangkau audiens online.\n\nChannel Digital Marketing:\n• SEO (Search Engine Optimization)\n• SEM (Search Engine Marketing)\n• Social Media Marketing\n• Email Marketing\n• Content Marketing\n• Influencer Marketing\n\nMemilih channel yang tepat tergantung pada target audiens dan budget."],
                    ['title' => 'SEO Fundamentals & On-Page Optimization', 'desc' => 'Teknik SEO untuk meningkatkan peringkat di Google',
                     'content' => "SEO membantu website muncul di halaman pertama hasil pencarian secara organik.\n\nOn-Page SEO:\n• Keyword research\n• Title tag dan meta description\n• Header tags (H1, H2, H3)\n• Content optimization\n• Internal linking\n• Image alt text\n\nOff-Page SEO:\n• Backlink building\n• Social signals\n• Brand mentions"],
                    ['title' => 'Social Media Marketing', 'desc' => 'Strategi konten untuk Instagram, TikTok, dan LinkedIn',
                     'content' => "Setiap platform memiliki karakteristik audiens dan format konten yang berbeda.\n\nStrategi per platform:\n• Instagram: visual storytelling, Reels\n• TikTok: konten viral, trends\n• LinkedIn: professional networking, B2B\n• Facebook: komunitas, ads targeting\n• Twitter/X: real-time engagement\n\nContent calendar dan konsistensi posting adalah kunci sukses social media."],
                    ['title' => 'Google Analytics & Pengukuran Hasil', 'desc' => 'Menganalisis performa campaign dengan data',
                     'content' => "Data adalah fondasi dari keputusan marketing yang baik.\n\nGoogle Analytics 4:\n• Setup dan konfigurasi\n• Understanding metrics\n• Traffic sources analysis\n• Conversion tracking\n• Audience insights\n\nKPI Digital Marketing:\n• CTR (Click-Through Rate)\n• Conversion Rate\n• CAC (Customer Acquisition Cost)\n• ROI (Return on Investment)\n\nMarketing tanpa pengukuran = terbang buta!"],
                ],
            ],
            // ── 10 KURSUS BARU ───────────────────────────────────────────────
            [
                'title' => 'React.js untuk Web Developer',
                'category' => 'Programming',
                'description' => 'Membangun aplikasi web dinamis dengan React.js, hooks, context API, dan ekosistem modern JavaScript.',
                'price' => 280000, 'duration' => 9, 'rating' => 4.75,
                'students_count' => 165, 'difficulty_level' => '2',
                'image' => $imgs[6],
                'lessons' => [
                    ['title' => 'Pengenalan React & JSX', 'desc' => 'Konsep dasar React dan sintaks JSX',
                     'content' => "React adalah library JavaScript untuk membangun UI yang dikembangkan oleh Meta (Facebook).\n\nKonsep utama:\n• Virtual DOM dan cara kerjanya\n• JSX - JavaScript dengan HTML\n• Component: Function vs Class\n• Props untuk passing data\n• Rendering dan re-rendering\n\nReact saat ini adalah library frontend paling populer di dunia."],
                    ['title' => 'React Hooks: useState & useEffect', 'desc' => 'State management modern dengan React Hooks',
                     'content' => "React Hooks memungkinkan penggunaan state dan lifecycle di function component.\n\nHooks yang dipelajari:\n• useState - menyimpan state lokal\n• useEffect - side effects\n• useContext - consume context\n• useRef - referensi DOM\n• useMemo dan useCallback - optimasi\n• Custom hooks\n\nHooks membuat kode React lebih bersih dan reusable."],
                    ['title' => 'React Router & Navigation', 'desc' => 'Routing multi-halaman dengan React Router v6',
                     'content' => "React Router memungkinkan navigasi antar halaman dalam Single Page Application.\n\nMateri React Router:\n• Setup React Router\n• BrowserRouter dan Routes\n• Link dan NavLink\n• Dynamic routes dengan params\n• Nested routes\n• Protected routes\n• useNavigate dan useParams hooks"],
                    ['title' => 'State Management dengan Context & Redux', 'desc' => 'Mengelola state global di aplikasi React',
                     'content' => "Untuk aplikasi besar, kita butuh state management yang lebih canggih.\n\nContext API:\n• createContext dan Provider\n• useContext hook\n• Kapan menggunakan Context\n\nRedux Toolkit:\n• Store, Slice, dan Reducer\n• Actions dan dispatch\n• useSelector dan useDispatch\n• Async dengan createAsyncThunk\n\nPilih sesuai kompleksitas aplikasi."],
                    ['title' => 'Proyek: Aplikasi Task Manager', 'desc' => 'Membangun aplikasi task manager dengan React dan API',
                     'content' => "Proyek ini menggabungkan semua konsep React yang telah dipelajari.\n\nFitur yang dibangun:\n• Autentikasi user (login/register)\n• CRUD tasks dengan REST API\n• Filter dan sorting tasks\n• Drag & drop interface\n• State management dengan Redux\n• Responsive design\n\nProyek ini siap dimasukkan ke portfolio!"],
                ],
            ],
            [
                'title' => 'Python untuk Pemula',
                'category' => 'Programming',
                'description' => 'Kuasai Python dari dasar hingga mampu membangun program sederhana, otomasi, dan scripting.',
                'price' => 120000, 'duration' => 5, 'rating' => 4.65,
                'students_count' => 310, 'difficulty_level' => '1',
                'image' => $imgs[7],
                'lessons' => [
                    ['title' => 'Instalasi Python & Hello World', 'desc' => 'Setup environment dan program Python pertama',
                     'content' => "Python adalah bahasa pemrograman yang mudah dipelajari dan sangat powerful.\n\nSetup:\n• Download dan install Python 3.x\n• Pilih IDE: VS Code, PyCharm, atau IDLE\n• Virtual environment\n• pip untuk package management\n\nKenapa Python?\n• Sintaks yang bersih dan mudah dibaca\n• Komunitas besar\n• Library yang sangat lengkap\n• Dipakai di data science, web, AI, automation"],
                    ['title' => 'Variabel, Tipe Data, dan Operator', 'desc' => 'Dasar-dasar Python: variabel dan operasi',
                     'content' => "Memahami tipe data adalah fondasi pemrograman Python.\n\nTipe data Python:\n• int, float, complex (numerik)\n• str (string)\n• bool (True/False)\n• list, tuple, dict, set\n\nOperator:\n• Aritmatika (+, -, *, /, //, %, **)\n• Perbandingan (==, !=, <, >, <=, >=)\n• Logika (and, or, not)\n• String formatting dengan f-string"],
                    ['title' => 'Control Flow: if, for, while', 'desc' => 'Mengontrol alur program dengan kondisi dan perulangan',
                     'content' => "Control flow menentukan urutan eksekusi program.\n\nKondisional:\n• if, elif, else\n• Ternary expression\n• Match-case (Python 3.10+)\n\nPerulangan:\n• for loop dengan range()\n• for loop dengan list/dict\n• while loop\n• break, continue, pass\n• List comprehension\n\nPraktik: Membuat kalkulator dan game tebak angka!"],
                    ['title' => 'Fungsi dan Module', 'desc' => 'Membuat kode yang reusable dengan fungsi',
                     'content' => "Fungsi memungkinkan kita menulis kode sekali dan menggunakannya berkali-kali.\n\nFungsi di Python:\n• def keyword\n• Parameter dan return value\n• Default parameter\n• *args dan **kwargs\n• Lambda function\n• Scope: local vs global\n\nModule:\n• import dan from...import\n• Built-in modules: math, os, datetime\n• pip install untuk third-party\n\nOrganisir kode dengan baik menggunakan fungsi!"],
                    ['title' => 'Proyek: Otomasi dengan Python', 'desc' => 'Membuat script otomasi untuk pekerjaan sehari-hari',
                     'content' => "Python sangat powerful untuk otomasi pekerjaan repetitif.\n\nProyek otomasi:\n• Rename file secara batch\n• Membaca dan menulis CSV/Excel\n• Web scraping dasar dengan BeautifulSoup\n• Mengirim email otomatis\n• Membuat chatbot sederhana\n\nDengan Python, Anda bisa menghemat jam kerja setiap hari!"],
                ],
            ],
            [
                'title' => 'Desain Grafis dengan Adobe Illustrator',
                'category' => 'Design',
                'description' => 'Belajar membuat logo, poster, dan desain vektor profesional menggunakan Adobe Illustrator.',
                'price' => 175000, 'duration' => 7, 'rating' => 4.55,
                'students_count' => 130, 'difficulty_level' => '2',
                'image' => $imgs[0],
                'lessons' => [
                    ['title' => 'Interface & Tools Dasar Illustrator', 'desc' => 'Mengenal workspace dan tools essensial',
                     'content' => "Adobe Illustrator adalah software standar industri untuk desain vektor.\n\nTools yang dipelajari:\n• Artboard management\n• Selection & Direct Selection\n• Pen Tool - membuat path\n• Shape tools\n• Type Tool\n• Color swatches dan palettes\n• Layer management\n\nVektor vs Raster: Vektor bisa diperbesar tanpa pecah, sangat cocok untuk logo!"],
                    ['title' => 'Mendesain Logo Profesional', 'desc' => 'Proses membuat logo dari konsep hingga final',
                     'content' => "Logo adalah identitas visual sebuah brand.\n\nProses desain logo:\n1. Brief dan riset\n2. Moodboard\n3. Sketsa manual\n4. Digitalisasi di Illustrator\n5. Refinement\n6. Color variants\n7. Export file\n\nPrinsip logo yang baik:\n• Simple dan memorable\n• Versatile (berfungsi di berbagai ukuran)\n• Timeless\n• Relevant dengan brand"],
                    ['title' => 'Typography & Layout', 'desc' => 'Menggunakan huruf dan layout secara profesional',
                     'content' => "Typography adalah seni mengatur huruf untuk komunikasi visual yang efektif.\n\nTopik typography:\n• Anatomy of type\n• Type classification\n• Font pairing yang harmonis\n• Hierarchy visual\n• Leading, kerning, tracking\n\nLayout principles:\n• Grid system\n• White space\n• Visual hierarchy\n• Balance dan alignment\n• F-pattern dan Z-pattern reading"],
                    ['title' => 'Desain Poster & Infografik', 'desc' => 'Membuat poster event dan infografik yang menarik',
                     'content' => "Poster dan infografik adalah media komunikasi visual yang powerful.\n\nPoster design:\n• Focal point\n• Color psychology\n• Typography hierarchy\n• Call-to-action\n\nInfografik:\n• Visualisasi data\n• Icon design\n• Flow chart\n• Timeline\n\nProyek: Desain poster event musik dan infografik statistik!"],
                ],
            ],
            [
                'title' => 'Microsoft Excel untuk Bisnis',
                'category' => 'Business',
                'description' => 'Menguasai Excel dari dasar hingga tingkat lanjut: formula, pivot table, dashboard, dan analisis data.',
                'price' => 100000, 'duration' => 4, 'rating' => 4.40,
                'students_count' => 420, 'difficulty_level' => '1',
                'image' => $imgs[1],
                'lessons' => [
                    ['title' => 'Excel Essentials & Formula Dasar', 'desc' => 'Dasar Excel: navigasi, format sel, dan formula umum',
                     'content' => "Microsoft Excel adalah tool paling populer untuk analisis data bisnis.\n\nFormula essensial:\n• SUM, AVERAGE, COUNT, COUNTA\n• MIN, MAX, MEDIAN\n• IF dan IF bersarang\n• AND, OR untuk kondisi\n• VLOOKUP dan HLOOKUP\n• INDEX dan MATCH\n\nTips:\n• Keyboard shortcut Excel\n• Format sel dan conditional formatting\n• Freeze panes"],
                    ['title' => 'Pivot Table & Pivot Chart', 'desc' => 'Analisis data cepat dengan Pivot Table',
                     'content' => "Pivot Table adalah fitur paling powerful Excel untuk analisis data.\n\nMembuat Pivot Table:\n• Insert PivotTable\n• Rows, Columns, Values, Filters\n• Grouping data\n• Calculated fields\n• Refresh data otomatis\n\nPivot Chart:\n• Membuat grafik dari Pivot Table\n• Slicer untuk filter interaktif\n• Timeline filter\n\nDengan Pivot Table, analisis ribuan baris data menjadi sangat mudah!"],
                    ['title' => 'Dashboard Excel yang Menarik', 'desc' => 'Membangun dashboard bisnis yang interaktif',
                     'content' => "Dashboard Excel memungkinkan visualisasi data bisnis secara real-time.\n\nKomponen dashboard:\n• Chart yang tepat untuk data yang tepat\n• KPI cards dengan conditional formatting\n• Slicer dan timeline\n• Dynamic charts dengan dropdown\n• Form controls\n\nPraktik:\n• Dashboard penjualan bulanan\n• KPI tracker\n• Forecasting sederhana\n\nDashboard yang baik menjawab pertanyaan bisnis seketika."],
                    ['title' => 'Otomasi Excel dengan Macro VBA', 'desc' => 'Mengotomasi tugas repetitif dengan VBA',
                     'content' => "VBA (Visual Basic for Applications) memungkinkan otomasi Excel.\n\nDasar VBA:\n• Macro recorder\n• VBA Editor\n• Sub dan Function\n• Variables dan data types\n• Loop dan kondisional\n• Manipulasi cell dan range\n\nContoh otomasi:\n• Membuat laporan otomatis\n• Konsolidasi data dari banyak sheet\n• Send email otomatis dari Excel\n• Generate PDF report\n\nVBA bisa menghemat berjam-jam pekerjaan manual!"],
                ],
            ],
            [
                'title' => 'Copywriting & Content Writing',
                'category' => 'Marketing',
                'description' => 'Kuasai seni menulis konten yang persuasif, engaging, dan mengkonversi untuk berbagai platform digital.',
                'price' => 130000, 'duration' => 4, 'rating' => 4.45,
                'students_count' => 195, 'difficulty_level' => '1',
                'image' => $imgs[2],
                'lessons' => [
                    ['title' => 'Dasar-Dasar Copywriting', 'desc' => 'Prinsip persuasi dan psikologi penulisan',
                     'content' => "Copywriting adalah seni menulis teks yang mempersuasi pembaca untuk mengambil tindakan.\n\nPrinsip dasar:\n• Memahami target audiens\n• Pain points dan desires\n• AIDA framework (Attention, Interest, Desire, Action)\n• PAS (Problem, Agitate, Solution)\n• Social proof dan credibility\n• Call-to-action yang kuat\n\nCopywriter yang baik adalah psikolog yang terselubung."],
                    ['title' => 'SEO Writing', 'desc' => 'Menulis konten yang ramah mesin pencari',
                     'content' => "Konten yang bagus harus juga ditemukan oleh Google.\n\nSEO Writing:\n• Keyword research dengan Google Keyword Planner\n• Integrasi keyword secara natural\n• Struktur artikel (H1, H2, H3)\n• Meta title dan meta description\n• Internal dan external linking\n• Readability (Flesch score)\n• Featured snippet optimization\n\nKonten yang baik + SEO yang kuat = traffic organik yang konsisten."],
                    ['title' => 'Social Media Copywriting', 'desc' => 'Menulis caption dan copy untuk Instagram, TikTok, LinkedIn',
                     'content' => "Setiap platform punya karakter konten yang berbeda.\n\nInstagram Caption:\n• Hook yang kuat di baris pertama\n• Storytelling\n• Hashtag strategy\n• CTA di akhir\n\nLinkedIn Post:\n• Professional storytelling\n• Insight berbasis data\n• Thought leadership\n\nTikTok Script:\n• Hook 3 detik pertama\n• Pacing yang cepat\n• Pattern interrupt\n\nPahami audiens masing-masing platform!"],
                    ['title' => 'Email Marketing Copywriting', 'desc' => 'Menulis email yang dibuka, dibaca, dan mengkonversi',
                     'content' => "Email marketing memiliki ROI tertinggi di antara semua channel marketing.\n\nAnatomi email yang convert:\n• Subject line yang memukau\n• Preview text yang memikat\n• Personalisasi\n• Opening yang kuat\n• Body yang scannable\n• CTA yang jelas\n• P.S. (Post Script) yang powerful\n\nTips:\n• A/B test subject lines\n• Segmentasi list\n• Timing pengiriman optimal\n• Mobile-friendly format"],
                ],
            ],
            [
                'title' => 'Cybersecurity Fundamentals',
                'category' => 'IT & Security',
                'description' => 'Pelajari dasar-dasar keamanan siber, ancaman umum, dan cara melindungi sistem dari serangan.',
                'price' => 320000, 'duration' => 10, 'rating' => 4.70,
                'students_count' => 70, 'difficulty_level' => '3',
                'image' => $imgs[3],
                'lessons' => [
                    ['title' => 'Pengenalan Cybersecurity', 'desc' => 'Landscape ancaman siber dan pentingnya keamanan',
                     'content' => "Cybersecurity adalah praktik melindungi sistem, jaringan, dan program dari serangan digital.\n\nTipe ancaman siber:\n• Malware (virus, trojan, ransomware)\n• Phishing dan social engineering\n• Man-in-the-Middle attack\n• SQL Injection\n• DDoS attack\n• Zero-day exploits\n\nTriad CIA:\n• Confidentiality (Kerahasiaan)\n• Integrity (Integritas)\n• Availability (Ketersediaan)\n\nSetiap 39 detik, ada serangan siber di dunia!"],
                    ['title' => 'Network Security Basics', 'desc' => 'Keamanan jaringan: firewall, VPN, dan enkripsi',
                     'content' => "Keamanan jaringan melindungi infrastruktur komunikasi dari akses tidak sah.\n\nKonsep utama:\n• Firewall dan cara kerjanya\n• VPN (Virtual Private Network)\n• SSL/TLS dan HTTPS\n• Network monitoring\n• IDS/IPS (Intrusion Detection/Prevention)\n• Segmentasi jaringan\n\nPraktik:\n• Konfigurasi dasar firewall\n• Analisis network traffic dengan Wireshark\n• Setup VPN sederhana"],
                    ['title' => 'Web Application Security', 'desc' => 'OWASP Top 10 dan cara mencegah serangan web',
                     'content' => "Web application adalah target serangan paling umum.\n\nOWASP Top 10:\n1. Injection (SQL, NoSQL, Command)\n2. Broken Authentication\n3. Sensitive Data Exposure\n4. XXE (XML External Entity)\n5. Broken Access Control\n6. Security Misconfiguration\n7. XSS (Cross-Site Scripting)\n8. Insecure Deserialization\n9. Using Components with Known Vulnerabilities\n10. Insufficient Logging\n\nSetiap developer web harus memahami ini!"],
                    ['title' => 'Ethical Hacking & Penetration Testing', 'desc' => 'Teknik dasar pen testing yang legal dan etis',
                     'content' => "Ethical hacking adalah pengujian keamanan sistem dengan izin pemilik.\n\nPentesting methodology:\n1. Reconnaissance\n2. Scanning\n3. Gaining Access\n4. Maintaining Access\n5. Covering Tracks\n6. Reporting\n\nTools yang digunakan:\n• Kali Linux\n• Nmap untuk network scanning\n• Metasploit Framework\n• Burp Suite untuk web testing\n• Hydra untuk brute force\n\nPENTING: Selalu dapatkan izin tertulis sebelum testing!"],
                ],
            ],
            [
                'title' => 'Database MySQL & PostgreSQL',
                'category' => 'Programming',
                'description' => 'Menguasai database relasional dari query dasar hingga optimasi, indexing, dan stored procedure.',
                'price' => 160000, 'duration' => 6, 'rating' => 4.60,
                'students_count' => 115, 'difficulty_level' => '2',
                'image' => $imgs[4],
                'lessons' => [
                    ['title' => 'Pengenalan Database Relasional', 'desc' => 'Konsep database, tabel, relasi, dan SQL basics',
                     'content' => "Database relasional menyimpan data dalam tabel yang saling terhubung.\n\nKonsep fundamental:\n• RDBMS (Relational Database Management System)\n• Tabel, baris, dan kolom\n• Primary key dan foreign key\n• Normalisasi (1NF, 2NF, 3NF)\n• Entity Relationship Diagram (ERD)\n\nSQL Basics:\n• SELECT, FROM, WHERE\n• INSERT, UPDATE, DELETE\n• ORDER BY dan LIMIT\n• GROUP BY dan HAVING\n\nSQL adalah bahasa universal database!"],
                    ['title' => 'Advanced SQL: JOIN & Subquery', 'desc' => 'Mengambil data dari banyak tabel dengan JOIN',
                     'content' => "JOIN memungkinkan kita menggabungkan data dari beberapa tabel.\n\nJenis JOIN:\n• INNER JOIN - data yang cocok di kedua tabel\n• LEFT JOIN - semua dari kiri + yang cocok dari kanan\n• RIGHT JOIN - kebalikan LEFT JOIN\n• FULL OUTER JOIN - semua dari kedua tabel\n• SELF JOIN - join tabel dengan dirinya sendiri\n\nSubquery:\n• Subquery di WHERE\n• Subquery di SELECT (correlated)\n• Subquery di FROM (derived table)\n• Common Table Expression (CTE) dengan WITH"],
                    ['title' => 'Indexing & Query Optimization', 'desc' => 'Membuat query yang cepat dan efisien',
                     'content' => "Query yang lambat bisa membuat aplikasi tidak responsif.\n\nIndexing:\n• Cara kerja index (B-Tree)\n• Single vs composite index\n• Unique index\n• Full-text index\n• Kapan harus dan tidak harus index\n\nQuery Optimization:\n• EXPLAIN dan EXPLAIN ANALYZE\n• Mengidentifikasi bottleneck\n• Avoiding SELECT *\n• Covering index\n• Partitioning tabel besar\n\nQuery yang baik bisa 100x lebih cepat dari yang buruk!"],
                    ['title' => 'Stored Procedure, View & Trigger', 'desc' => 'Logika bisnis di dalam database',
                     'content' => "Database modern mendukung pemrograman di dalam database itu sendiri.\n\nStored Procedure:\n• Membuat dan memanggil SP\n• Parameter IN dan OUT\n• Error handling\n• Kapan menggunakan SP\n\nView:\n• Virtual table dari query kompleks\n• Materialized view\n\nTrigger:\n• BEFORE dan AFTER trigger\n• INSERT, UPDATE, DELETE trigger\n• Audit trail dengan trigger\n• Cascading operations\n\nPraktek: Membangun sistem inventory dengan SP!"],
                ],
            ],
            [
                'title' => 'Entrepreneurship & Business Planning',
                'category' => 'Business',
                'description' => 'Validasi ide bisnis, membuat business plan, mencari pendanaan, dan membangun startup dari nol.',
                'price' => 220000, 'duration' => 8, 'rating' => 4.35,
                'students_count' => 90, 'difficulty_level' => '2',
                'image' => $imgs[5],
                'lessons' => [
                    ['title' => 'Ideasi & Validasi Ide Bisnis', 'desc' => 'Menemukan dan memvalidasi peluang bisnis yang tepat',
                     'content' => "Ide bisnis yang bagus belum tentu ide bisnis yang laku.\n\nFramework ideasi:\n• Design Thinking\n• Problem-Solution Fit\n• Jobs-to-be-done Framework\n\nValidasi ide:\n• Customer interviews\n• Landing page test\n• MVP (Minimum Viable Product)\n• Smoke test dengan pre-order\n• A/B testing\n\nIngat: Jatuh cinta dengan masalah, bukan solusi!"],
                    ['title' => 'Business Model Canvas', 'desc' => 'Merancang model bisnis yang berkelanjutan',
                     'content' => "Business Model Canvas (BMC) adalah tool visualisasi model bisnis satu halaman.\n\n9 Blok BMC:\n1. Customer Segments\n2. Value Propositions\n3. Channels\n4. Customer Relationships\n5. Revenue Streams\n6. Key Resources\n7. Key Activities\n8. Key Partnerships\n9. Cost Structure\n\nPraktik: Analisis BMC Gojek, Tokopedia, dan startup unicorn Indonesia lainnya!"],
                    ['title' => 'Financial Planning & Unit Economics', 'desc' => 'Memahami keuangan bisnis dan unit economics',
                     'content' => "Tanpa pemahaman keuangan, bisnis yang bagus pun bisa bangkrut.\n\nKonsep keuangan bisnis:\n• Revenue model: subscription, transaksional, freemium\n• Unit Economics: LTV, CAC, Payback period\n• Burn rate dan runway\n• Break-even analysis\n• Cash flow forecasting\n• P&L (Profit & Loss) statement\n\nFormula penting:\n• LTV > 3x CAC = bisnis yang sehat\n• Gross Margin = (Revenue - COGS) / Revenue"],
                    ['title' => 'Pitching & Mencari Investor', 'desc' => 'Membuat pitch deck dan presentasi ke investor',
                     'content' => "Mendapatkan investasi membutuhkan skill pitching yang baik.\n\nStruktur pitch deck:\n1. Problem\n2. Solution\n3. Market Size\n4. Product Demo\n5. Business Model\n6. Traction\n7. Team\n8. Financial Projections\n9. Ask (berapa yang dibutuhkan)\n\nTips pitching:\n• 30-second elevator pitch\n• Storytelling yang compelling\n• Data beats opinion\n• Kenali investor Anda\n• Antisipasi pertanyaan sulit"],
                ],
            ],
            [
                'title' => 'Video Editing dengan CapCut & Premiere Pro',
                'category' => 'Design',
                'description' => 'Belajar editing video dari dasar hingga mahir untuk konten media sosial dan YouTube.',
                'price' => 145000, 'duration' => 5, 'rating' => 4.50,
                'students_count' => 250, 'difficulty_level' => '1',
                'image' => $imgs[6],
                'lessons' => [
                    ['title' => 'Dasar-Dasar Video Editing', 'desc' => 'Konsep editing dan terminologi video',
                     'content' => "Video editing adalah proses mengolah footage mentah menjadi konten yang menarik.\n\nTerminologi video:\n• Frame rate (fps): 24, 30, 60\n• Resolution: 1080p, 4K\n• Aspect ratio: 16:9, 9:16 (vertikal), 1:1\n• Codec dan format file\n• Timeline dan cut points\n\nPrinsip editing:\n• Cut on action\n• L-cut dan J-cut\n• Pacing sesuai mood\n• Jump cut untuk dinamis\n\nPilih software sesuai kebutuhan dan budget!"],
                    ['title' => 'Editing di CapCut untuk Social Media', 'desc' => 'Membuat konten viral dengan CapCut',
                     'content' => "CapCut adalah app editing video gratis yang sangat populer untuk konten TikTok dan Reels.\n\nFitur CapCut:\n• Basic cut dan trim\n• Transitions yang smooth\n• Text animasi\n• Musik dan sound effects\n• Green screen\n• Auto captions\n• Templates viral\n• AI features\n\nWorkflow konten:\n1. Import footage\n2. Susun klip\n3. Tambah musik\n4. Color grading\n5. Text dan sticker\n6. Export 1080p"],
                    ['title' => 'Adobe Premiere Pro Intermediate', 'desc' => 'Video editing profesional dengan Premiere Pro',
                     'content' => "Adobe Premiere Pro adalah standar industri untuk video editing profesional.\n\nFitur yang dipelajari:\n• Timeline management\n• Multi-camera editing\n• Color grading dengan Lumetri\n• Audio mixing\n• Stabilisasi video\n• Green screen (Chroma Key)\n• Motion graphics dasar\n• Export untuk berbagai platform\n\nWorkflow YouTube:\n• Intro yang menarik\n• B-roll dan cutaways\n• Lower thirds\n• End card"],
                    ['title' => 'Color Grading & Sound Design', 'desc' => 'Sentuhan profesional dengan color grading dan audio',
                     'content' => "Color grading dan sound design membedakan video amatir dan profesional.\n\nColor Grading:\n• Color correction vs color grading\n• Lift, Gamma, Gain\n• Three-way color wheel\n• LUT (Look Up Table)\n• Cinematic look\n• Matching shots\n\nSound Design:\n• Noise removal\n• EQ dan compression\n• Music bed dan sound effects\n• Audio normalization\n• Podcast-quality voice\n\nMatching audio dan visual yang baik = konten yang powerful!"],
                ],
            ],
            [
                'title' => 'English for Business & Professional',
                'category' => 'Language',
                'description' => 'Tingkatkan kemampuan Bahasa Inggris untuk keperluan profesional: presentasi, email, negosiasi, dan meeting.',
                'price' => 185000, 'duration' => 8, 'rating' => 4.55,
                'students_count' => 140, 'difficulty_level' => '2',
                'image' => $imgs[7],
                'lessons' => [
                    ['title' => 'Business Email Writing', 'desc' => 'Menulis email profesional dalam Bahasa Inggris',
                     'content' => "Email adalah alat komunikasi bisnis yang paling sering digunakan.\n\nStruktur email profesional:\n• Subject line yang jelas dan spesifik\n• Salutation yang tepat\n• Opening statement\n• Body: satu topik per paragraf\n• Call-to-action\n• Professional closing\n\nPhrase berguna:\n• I hope this email finds you well\n• Please find attached...\n• I would like to request...\n• Thank you for your prompt response\n• Looking forward to hearing from you\n\nHindari: terlalu informal, typo, cc yang tidak perlu."],
                    ['title' => 'Business Meeting & Presentation', 'desc' => 'Memimpin meeting dan presentasi dalam Bahasa Inggris',
                     'content' => "Confidence dalam meeting dan presentasi sangat penting untuk karir global.\n\nMeeting language:\n• Opening: 'Shall we get started?'\n• Agenda: 'The purpose of today's meeting is...'\n• Inviting opinions: 'What are your thoughts on...?'\n• Agreeing: 'That's a great point'\n• Disagreeing politely: 'I see your point, however...'\n• Closing: 'To summarize, we've agreed to...'\n\nPresentation structure:\n• Hook yang kuat\n• Clear structure\n• Data storytelling\n• Q&A handling"],
                    ['title' => 'Business Negotiation Skills', 'desc' => 'Teknik negosiasi profesional dalam Bahasa Inggris',
                     'content' => "Negosiasi yang baik menghasilkan win-win solution.\n\nNegosiasi language:\n• Opening position: 'Our initial offer is...'\n• Making concessions: 'If you can..., we'd be willing to...'\n• Asking for concessions: 'Could you consider...?'\n• Expressing hesitation: 'I need to think about it'\n• Counter-offer: 'How about we...?'\n• Closing: 'I think we have a deal'\n\nPrinsip BATNA:\n• Best Alternative To Negotiated Agreement\n• Kenali BATNA Anda sebelum negosiasi"],
                    ['title' => 'LinkedIn & Professional Networking', 'desc' => 'Membangun personal brand profesional dalam Bahasa Inggris',
                     'content' => "LinkedIn adalah platform networking profesional terbesar di dunia.\n\nOptimasi LinkedIn Profile:\n• Headline yang compelling\n• Summary yang bercerita\n• Experience dengan achievement, bukan duties\n• Skills dan endorsements\n• Recommendations\n\nNetworking messages:\n• Connection request message\n• Follow-up after meeting\n• Asking for informational interview\n• Thank you note\n\nContent LinkedIn:\n• Share insights dari pekerjaan\n• Comment thoughtfully\n• Write articles\n• Engage dengan connection"],
                ],
            ],
        ];

        foreach ($courses as $courseData) {
            $lessons = $courseData['lessons'];
            unset($courseData['lessons']);

            // Update jika sudah ada, create jika belum
            $course = Course::firstOrCreate(
                ['title' => $courseData['title']],
                $courseData
            );

            // Update image jika masih null
            if ($course->image === null && isset($courseData['image'])) {
                $course->update(['image' => $courseData['image']]);
            }

            // Tambah lessons hanya jika belum ada
            if ($course->lessons()->count() === 0) {
                foreach ($lessons as $index => $lesson) {
                    Lesson::create([
                        'course_id'   => $course->id,
                        'title'       => $lesson['title'],
                        'description' => $lesson['desc'],
                        'video_url'   => null,
                        'content'     => $lesson['content'],
                        'order'       => $index + 1,
                    ]);
                }
            }
        }
    }
}
