<!DOCTYPE html>
<html>
<head>
    <title>Exam Result Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hero-bg {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
        .glow { box-shadow: 0 0 30px rgba(59, 130, 246, 0.6); }
        .text-shadow { text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8); }
        .card-bg { background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="antialiased">
    <div class="hero-bg min-h-screen flex items-center justify-center">
        <div class="text-center text-white p-8 max-w-4xl mx-auto">
            <!-- Main Title with Animation -->
            <div class="animate-float mb-8">
                <h1 class="text-5xl md:text-7xl font-bold mb-4 text-shadow leading-tight">
                    <span class="text-blue-400">Exam</span> and <span class="text-blue-400">Result</span> Management System
                </h1>
                <div class="w-32 h-1 bg-gradient-to-r from-blue-400 to-purple-400 mx-auto rounded-full animate-pulse"></div>
            </div>

            <!-- Author Credit -->
            <div class="mb-12 animate-bounce">
                <p class="text-2xl md:text-3xl text-blue-200 font-medium mb-2 text-shadow">
                    by Umar Niazi, M Okasha, Sajjad Ahmad
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="card-bg rounded-xl p-6 border border-white border-opacity-30 hover:bg-opacity-25 transition-all duration-300 shadow-xl">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-semibold mb-2 text-shadow">Student Management</h3>
                    <p class="text-blue-100 text-sm text-shadow">Efficiently manage student records</p>
                </div>

                <div class="card-bg rounded-xl p-6 border border-white border-opacity-30 hover:bg-opacity-25 transition-all duration-300 shadow-xl">
                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-semibold mb-2 text-shadow">Result Tracking</h3>
                    <p class="text-blue-100 text-sm text-shadow">Track exam results with precision</p>
                </div>

                <div class="card-bg rounded-xl p-6 border border-white border-opacity-30 hover:bg-opacity-25 transition-all duration-300 shadow-xl">
                    <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-semibold mb-2 text-shadow">Analytics</h3>
                    <p class="text-blue-100 text-sm text-shadow">Comprehensive reporting system</p>
                </div>
            </div>

            <!-- Get Started Button -->
            <div class="animate-bounce">
                <a href="{{ route('login') }}" 
                   class="group inline-flex items-center px-12 py-6 text-2xl font-bold text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-full shadow-2xl hover:shadow-blue-500/50 transition-all duration-500 transform hover:scale-110 hover:-translate-y-2 glow">
                    <svg class="w-8 h-8 mr-4 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                    Get Started
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-12 text-center">
                <p class="text-blue-200 text-lg mb-4 text-shadow">Experience the future of academic management</p>
                <div class="flex justify-center space-x-4 text-blue-300">
                    <span class="flex items-center text-shadow">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Secure
                    </span>
                    <span class="flex items-center text-shadow">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Fast
                    </span>
                    <span class="flex items-center text-shadow">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Reliable
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 