<!-- Layout Blade -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','AtunLaundry')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Navbar scroll effect */
        .navbar-scroll {
            backdrop-filter: blur(12px);
            background-color: rgba(236, 72, 153, 0.85);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease-in-out;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 1s ease forwards; }

        /* Hover nav links */
        .nav-link { position: relative; transition: color 0.3s ease, transform 0.3s ease; }
        .nav-link::after { content: ''; position: absolute; width: 0; height: 3px; bottom: -5px; left: 0; background-color: white; transition: width 0.3s ease; }
        .nav-link:hover::after { width: 100%; }
        .nav-link:hover { transform: translateY(-2px); }

        /* Smooth scroll */
        html { scroll-behavior: smooth; }

        /* Offset for fixed navbar */
        section { scroll-margin-top: 80px; }
    </style>
</head>
<body class="bg-pink-50 font-sans text-gray-900">

    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 w-full z-50 bg-pink-400 text-white py-4 shadow-lg transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <a href="#home" class="text-3xl font-extrabold flex items-center gap-2">
                <i class="fa-solid fa-shirt text-white"></i> AtunLaundry
            </a>
            <div class="hidden md:flex items-center gap-8 text-lg font-semibold">
                <a href="#home" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
                <a href="#services" class="nav-link"><i class="fa-solid fa-hand-holding-heart"></i> Layanan</a>
                <a href="#orders" class="nav-link"><i class="fa-solid fa-basket-shopping"></i> Pesanan</a>
                <a href="#riwayat"class="nav-link"><i class="fa-solid fa-history"></i> Riwayat</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                </form>
            </div>
            <button id="menu-btn" class="md:hidden text-2xl"><i class="fa-solid fa-bars"></i></button>
        </div>  

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-pink-300 px-6 py-4 space-y-3">
            <a href="#home" class="block nav-link"><i class="fa-solid fa-house"></i> Home</a>
            <a href="#services" class="block nav-link"><i class="fa-solid fa-basket-shopping"></i> Layanan</a>
            <a href="#why-us" class="block nav-link"><i class="fa-solid fa-question-circle"></i> Kenapa Pilih Kami</a>
            <a href="#orders" class="block nav-link"><i class="fa-solid fa-receipt"></i> Pesanan</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block w-full text-left nav-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
            </form>
        </div>
     </nav>

    <!-- Spacer -->
    <div class="pt-20">
    </div>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-pink-400 to-pink-500 text-white text-center py-12 mt-16 shadow-inner">
        <p class="mb-2 text-2xl font-semibold">AtunLaundry &copy; {{ date('Y') }} | Semua hak dilindungi.</p>
        <p class="text-1xl">Jl. Katinegara No.1, Kota, Indonesia | Telepon: 0812-3456-7890</p>
        <div class="flex justify-center mt-4 gap-6 text-3xl">
            <a href="#" class="hover:text-pink-100 transition transform hover:scale-125"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-pink-100 transition transform hover:scale-125"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-pink-100 transition transform hover:scale-125"><i class="fab fa-whatsapp"></i></a>
            <a href="mailto:info@AtunLaundry.com" class="hover:text-pink-100 transition transform hover:scale-125"><i class="fa-solid fa-envelope"></i></a>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 30) navbar.classList.add('navbar-scroll');
            else navbar.classList.remove('navbar-scroll');
        });

        // Mobile menu toggle
        document.getElementById('menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>
</html>
