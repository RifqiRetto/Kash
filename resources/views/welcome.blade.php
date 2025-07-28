<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SISFUND') }} - Sistem Kas Siswa Modern</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        .bg-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite ease-in-out;
        }

        .shape:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -150px;
            left: -150px;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 200px;
            height: 200px;
            top: 50%;
            right: -100px;
            animation-delay: -7s;
        }

        .shape:nth-child(3) {
            width: 150px;
            height: 150px;
            bottom: -75px;
            left: 20%;
            animation-delay: -14s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(90deg); }
            50% { transform: translateY(0) rotate(180deg); }
            75% { transform: translateY(-10px) rotate(270deg); }
        }

        /* Header */
        .header {
            position: relative;
            z-index: 10;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo::before {
            content: "💰";
            font-size: 1.8rem;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
        }

        .nav-link {
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .nav-link.primary {
            background: rgba(255, 255, 255, 0.9);
            color: #667eea;
            border: none;
        }

        .nav-link.primary:hover {
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* Main Content */
        .main-container {
            position: relative;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 120px);
            padding: 2rem;
        }

        .content-wrapper {
            max-width: 1200px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .text-content {
            color: white;
        }

        .badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .main-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff, #f0f9ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            font-size: 1.25rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: white;
            color: #667eea;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
            transform: translateY(-2px);
        }

        .stats {
            display: flex;
            gap: 2rem;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            font-size: 0.875rem;
            opacity: 0.8;
            margin-top: 0.5rem;
        }

        /* Card Container */
        .card-container {
            position: relative;
            perspective: 1000px;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.3s ease;
        }

        .main-card:hover {
            transform: rotateY(5deg) rotateX(5deg);
        }

        .card-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .card-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .card-subtitle {
            color: #6b7280;
            font-size: 1rem;
        }

        .features {
            list-style: none;
            margin: 2rem 0;
        }

        .features li {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .features li:last-child {
            border-bottom: none;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .feature-text {
            flex: 1;
        }

        .feature-title {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .feature-desc {
            font-size: 0.875rem;
            color: #6b7280;
        }

        /* Floating Elements */
        .floating-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: floatUpDown 3s ease-in-out infinite;
        }

        .floating-card.card-1 {
            top: -20px;
            right: -40px;
            animation-delay: 0s;
        }

        .floating-card.card-2 {
            bottom: -30px;
            left: -30px;
            animation-delay: -1.5s;
        }

        @keyframes floatUpDown {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .floating-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .floating-text {
            font-size: 0.875rem;
            font-weight: 600;
            color: #1f2937;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .content-wrapper {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }

            .main-title {
                font-size: 2.5rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .stats {
                justify-content: center;
            }

            .nav-links {
                flex-direction: column;
                gap: 0.5rem;
            }

            .header {
                flex-direction: column;
                gap: 1rem;
            }

            .floating-card {
                display: none;
            }
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            transition: opacity 0.5s ease;
        }

        .loading-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loader"></div>
    </div>

    <div class="bg-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <header class="header">
        <a href="{{ url('/') }}" class="logo">{{ config('app.name', 'SISFUND') }}</a>
        
        @if (Route::has('login'))
            <nav class="nav-links">
                @auth
                    <a href="{{ url('/dashboard') }}" class="nav-link primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link primary">Daftar</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="main-container">
        <div class="content-wrapper">
            <div class="text-content">
                <div class="badge">✨ Sistem Terbaru {{ date('Y') }}</div>
                <h1 class="main-title">Kelola Kas Siswa dengan Mudah</h1>
                <p class="subtitle">
                    Platform modern untuk mengelola kas kelas dengan transparansi penuh. 
                    Pantau pemasukan, pengeluaran, dan laporan keuangan secara real-time.
                </p>
                
                <div class="cta-buttons">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                            🚀 Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            🚀 Mulai Sekarang
                        </a>
                    @endauth
                    <a href="#demo" class="btn btn-secondary">
                        📱 Demo Aplikasi
                    </a>
                </div>

                <div class="stats">
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Siswa Aktif</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Kelas Terdaftar</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">99%</span>
                        <span class="stat-label">Kepuasan</span>
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="main-card">
                    <div class="card-header">
                        <div class="card-icon">💳</div>
                        <h2 class="card-title">Fitur Unggulan</h2>
                        <p class="card-subtitle">Semua yang Anda butuhkan dalam satu platform</p>
                    </div>

                    <ul class="features">
                        <li>
                            <div class="feature-icon">💰</div>
                            <div class="feature-text">
                                <div class="feature-title">Tracking Otomatis</div>
                                <div class="feature-desc">Catat pemasukan & pengeluaran secara otomatis</div>
                            </div>
                        </li>
                        <li>
                            <div class="feature-icon">📊</div>
                            <div class="feature-text">
                                <div class="feature-title">Laporan Real-time</div>
                                <div class="feature-desc">Dashboard analitik yang mudah dipahami</div>
                            </div>
                        </li>
                        <li>
                            <div class="feature-icon">🔒</div>
                            <div class="feature-text">
                                <div class="feature-title">Keamanan Terjamin</div>
                                <div class="feature-desc">Data terenkripsi dengan teknologi terdepan</div>
                            </div>
                        </li>
                        <li>
                            <div class="feature-icon">📱</div>
                            <div class="feature-text">
                                <div class="feature-title">Mobile Friendly</div>
                                <div class="feature-desc">Akses dari mana saja, kapan saja</div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="floating-card card-1">
                    <div class="floating-icon">📈</div>
                    <div class="floating-text">Analisis Mendalam</div>
                </div>

                <div class="floating-card card-2">
                    <div class="floating-icon">⚡</div>
                    <div class="floating-text">Super Cepat</div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Loading animation
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loadingOverlay').classList.add('hidden');
            }, 1000);
        });

        // Smooth hover effects for cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.main-card');
            
            cards.forEach(card => {
                card.addEventListener('mousemove', function(e) {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateX = (y - centerY) / 10;
                    const rotateY = (centerX - x) / 10;
                    
                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
                });
                
                card.addEventListener('mouseleave', function() {
                    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
                });
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.main-card, .text-content').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>