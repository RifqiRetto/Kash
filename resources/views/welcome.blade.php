<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kas Siswa - Kelola Uang Kas dengan Mudah</title>
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen overflow-x-hidden">
    <!-- Background decorative elements -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
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
                <a href="{{ route('login') }}" class="block text-blue-600 font-medium">Masuk</a>
                <a href="{{ route('register') }}" class="block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg text-center">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative z-10 pt-20 pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Kelola Kas Kelas</span>
                    <br>
                    <span class="text-gray-800">Secara Digital</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Solusi modern untuk mengelola keuangan kelas dengan transparansi penuh. Catat pemasukan dan pengeluaran dengan mudah, kapan saja, di mana saja.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-slide-up">
                    <a href="{{ route('register') }}" class="group px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold text-lg shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:scale-105 hover:from-blue-700 hover:to-purple-700">
                        <span class="flex items-center">
                            Daftar Gratis
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </a>
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-white text-gray-700 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-blue-300 transform hover:scale-105">
                        Masuk Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="relative z-10 py-20 bg-white/60 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Kenapa Memilih KasSiswa?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Fitur-fitur unggulan yang membuat pengelolaan kas menjadi lebih mudah</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02] border border-white/50">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Laporan Otomatis</h3>
                    <p class="text-gray-600 leading-relaxed">Sistem kami secara otomatis menghasilkan laporan keuangan yang jelas dan mudah dipahami untuk transparansi penuh.</p>
                </div>

                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02] border border-white/50">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Keamanan Data</h3>
                    <p class="text-gray-600 leading-relaxed">Data keuangan kelas Anda terlindungi dengan enkripsi tingkat tinggi dan sistem backup otomatis.</p>
                </div>

                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02] border border-white/50">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-400 to-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Kolaborasi Kelas</h3>
                    <p class="text-gray-600 leading-relaxed">Bendahara dan anggota kelas dapat bekerja sama dalam satu platform yang terintegrasi dengan baik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Cara Kerja KasSiswa</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Hanya perlu 3 langkah sederhana untuk memulai</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="mx-auto w-20 h-20 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full flex items-center justify-center mb-6 text-3xl font-bold text-blue-600">1</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Buat Akun</h3>
                    <p class="text-gray-600">Daftar sebagai bendahara atau anggota kelas dalam hitungan menit</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto w-20 h-20 bg-gradient-to-r from-purple-100 to-pink-100 rounded-full flex items-center justify-center mb-6 text-3xl font-bold text-purple-600">2</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Atur Kelas</h3>
                    <p class="text-gray-600">Buat grup kelas dan undang anggota melalui kode unik</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto w-20 h-20 bg-gradient-to-r from-green-100 to-blue-100 rounded-full flex items-center justify-center mb-6 text-3xl font-bold text-green-600">3</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Mulai Kelola</h3>
                    <p class="text-gray-600">Catat transaksi dan pantau keuangan kelas secara real-time</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="relative z-10 py-20 bg-white/60 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Apa Kata Mereka?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Testimoni dari pengguna KasSiswa</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full"></div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Andi Wijaya</h4>
                            <p class="text-sm text-gray-500">Bendahara Kelas XII IPA 1</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"KasSiswa sangat membantu saya sebagai bendahara. Sekarang tidak perlu repot bawa buku kas kemana-mana, semua bisa diakses dari HP!"</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-blue-400 rounded-full"></div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Siti Rahma</h4>
                            <p class="text-sm text-gray-500">Ketua Kelas X IPS 2</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Transparansi keuangan kelas kami meningkat drastis sejak pakai KasSiswa. Semua anggota bisa melihat laporan kapan saja."</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-pink-400 to-red-400 rounded-full"></div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Budi Santoso</h4>
                            <p class="text-sm text-gray-500">Guru BK</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Sebagai pembimbing, saya sangat apresiasi tools seperti KasSiswa yang mengajarkan tanggung jawab keuangan pada siswa."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2 animate-bounce-slow">1000+</div>
                    <div class="text-xl text-gray-600 font-medium">Pengguna Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent mb-2 animate-bounce-slow" style="animation-delay: -0.5s;">50+</div>
                    <div class="text-xl text-gray-600 font-medium">Kelas Terdaftar</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2 animate-bounce-slow" style="animation-delay: -1s;">99%</div>
                    <div class="text-xl text-gray-600 font-medium">Kepuasan Pengguna</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent mb-2 animate-bounce-slow" style="animation-delay: -1.5s;">24/7</div>
                    <div class="text-xl text-gray-600 font-medium">Dukungan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="relative z-10 py-20 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Siap Mengelola Kas Kelas dengan Lebih Baik?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Bergabunglah dengan ratusan kelas lainnya yang telah mempercayakan pengelolaan kas mereka pada KasSiswa</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-blue-600 rounded-xl font-semibold text-lg shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:scale-105 hover:bg-gray-50">
                    Daftar Sekarang - Gratis
                </a>
                <a href="{{ route('login') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white rounded-xl font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 transform hover:scale-105">
                    Masuk ke Akun Saya
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="relative z-10 py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">