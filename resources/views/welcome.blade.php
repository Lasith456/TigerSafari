<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safari Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-900 text-white">
@if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
    <!-- Hero Section with Background Video -->
    <section class="relative h-screen flex items-center justify-center text-center">
        <video class="absolute inset-0 w-full h-full object-cover" autoplay loop muted>
            <source src="{{ asset('videos/safari.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 max-w-4xl">
            <h1 class="text-5xl font-bold mb-4">Safari Management System</h1>
            <p class="text-lg mb-6">Effortlessly manage safaris with an efficient system for admins and staff.</p>
            <a href="#about" class="bg-green-500 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-600 transition">Learn More</a>
        </div>
    </section>
    
    <!-- About Section -->
    <section id="about" class="py-20 px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">What This System Does</h2>
        <p class="max-w-3xl mx-auto text-lg">The Safari Management System streamlines safari operations. Admins can add, edit, or delete safari details, while other staff members can view information such as driver assignments and schedules.</p>
    </section>
    
    <!-- Features Section -->
    <section class="py-20 px-6 bg-gray-800">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">System Features</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="p-6 bg-gray-700 rounded-lg">
                    <h3 class="text-xl font-semibold">Admin Dashboard</h3>
                    <p class="text-sm mt-2">Admins can add, edit, and delete safari details including driver information and dates.</p>
                </div>
                <div class="p-6 bg-gray-700 rounded-lg">
                    <h3 class="text-xl font-semibold">Worker Access</h3>
                    <p class="text-sm mt-2">Workers can view safari schedules and details but cannot modify data.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="py-6 bg-gray-900 text-center text-sm">
        <p>© 2025 Navicodes.com. All rights reserved.</p>
    </footer>
    
    <script>
        gsap.from("h1", { opacity: 0, y: -50, duration: 1 });
        gsap.from("p", { opacity: 0, y: 30, duration: 1, delay: 0.5 });
    </script>
</body>
</html>
