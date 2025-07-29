<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kas Siswa - Kelola Uang Kasmu dengan Mudah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 2s infinite',
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen overflow-x-hidden">
    <!-- Background decorative elements -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-10 left-10 w-32 h-32 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full opacity-10 animate-float"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-gradient-to-r from-green-400 to-blue-400 rounded-full opacity-10 animate-float" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 left-1/4 w-20 h-20 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full opacity-10 animate-float" style="animation-delay: -4s;"></div>
        <div class="absolute bottom-40 right-1/3 w-28 h-28 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full opacity-10 animate-float" style="animation-delay: -1s;"></div>
    </div>

    <!-- Navigation -->
    <nav class="relative z-10 bg-white/80 backdrop-blur-md border-b border-white/20 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg animate-pulse-slow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">KasSiswa</span>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 font-medium">Beranda</a>
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-300 font-medium">Dashboard</a>
                    <a href="{{ route('login') }}" class="px-4 py-2 text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-all duration-300 font-medium">Masuk</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:scale-105">Daftar</a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-600 hover:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/90 backdrop-blur-md border-t border-white/20">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ url('/') }}" class="block text-gray-600 hover:text-blue-600 transition-colors">Beranda</a>
                <a href="{{ url('/dashboard') }}" class="block text-gray-600 hover:text-blue-600 transition-colors">Dashboard</a>
                <a href="{{ route('login') }}" class="block text-blue-600 font-medium">Masuk</a>
                <a href="{{ route('register') }}" class="block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg text-center">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative z-10 pt-20 pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in">
                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Kelola Kas</span>
                    <br>
                    <span class="text-gray-800">dengan Mudah!</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Platform digital terpercaya untuk mengelola kas kelas. Transparan, aman, dan mudah digunakan untuk semua siswa.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-slide-up">
                    <a href="{{ route('register') }}" class="group px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold text-lg shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:scale-105 hover:from-blue-700 hover:to-purple-700">
                        <span class="flex items-center">
                            Mulai Sekarang
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </a>
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-white text-gray-700 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-blue-300 transform hover:scale-105">
                        Sudah Punya Akun?
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="relative z-10 py-20 bg-white/60 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Fitur Unggulan</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Nikmati pengalaman mengelola kas yang belum pernah ada sebelumnya</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 border border-white/50">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Laporan Real-time</h3>
                    <p class="text-gray-600 leading-relaxed">Pantau pemasukan dan pengeluaran kas secara langsung dengan grafik yang mudah dipahami</p>
                </div>

                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 border border-white/50">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Keamanan Terjamin</h3>
                    <p class="text-gray-600 leading-relaxed">Data kas terlindungi dengan enkripsi tingkat tinggi dan sistem keamanan berlapis</p>
                </div>

                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 border border-white/50">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-400 to-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Kolaborasi Tim</h3>
                    <p class="text-gray-600 leading-relaxed">Semua anggota kelas dapat berkontribusi dan memantau kas bersama-sama</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Dipercaya Ribuan Siswa</h2>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2 animate-bounce-slow">1000+</div>
                    <div class="text-xl text-gray-600 font-medium">Siswa Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent mb-2 animate-bounce-slow" style="animation-delay: -0.5s;">50+</div>
                    <div class="text-xl text-gray-600 font-medium">Kelas Terdaftar</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2 animate-bounce-slow" style="animation-delay: -1s;">99%</div>
                    <div class="text-xl text-gray-600 font-medium">Kepuasan</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent mb-2 animate-bounce-slow" style="animation-delay: -1.5s;">24/7</div>
                    <div class="text-xl text-gray-600 font-medium">Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative z-10 py-20 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Siap Memulai?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Bergabunglah dengan ribuan siswa lainnya dan rasakan kemudahan mengelola kas kelas</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-blue-600 rounded-xl font-semibold text-lg shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:scale-105 hover:bg-gray-50">
                    Daftar Gratis Sekarang
                </a>
                <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white rounded-xl font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 transform hover:scale-105">
                    Lihat Demo
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative z-10 bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold">KasSiswa</span>
                </div>
                <p class="text-gray-400 mb-6">Platform manajemen kas siswa terpercaya</p>
                <div class="flex justify-center space-x-6 mb-6">
                    <a href="{{ url('/') }}" class="text-gray-400 hover:text-white transition-colors">Beranda</a>
                    <a href="{{ url('/dashboard') }}" class="text-gray-400 hover:text-white transition-colors">Dashboard</a>
                    <a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition-colors">Daftar</a>
                </div>
                <p class="text-gray-500 text-sm">&copy; 2025 KasSiswa. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-slide-up');
                }
            });
        }, observerOptions);

        document.querySelectorAll('section > div').forEach(el => {
            observer.observe(el);
        });

        // Parallax effect for background elements
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelectorAll('.animate-float');
            const speed = 0.5;

            parallax.forEach(element => {
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });
    </script>
</body>
</html>
