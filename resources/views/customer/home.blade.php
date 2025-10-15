@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- 🌸 Hero Section -->
<section class="bg-gradient-to-br from-pink-100 via-pink-200 to-pink-300 py-24 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('/images/bubble-bg.svg')] opacity-20 bg-cover"></div>
    <div class="max-w-5xl mx-auto px-6 relative z-10">
        <h1 class="text-5xl md:text-6xl font-extrabold text-pink-800 mb-6 animate-fade-in">
            Selamat Datang di <span class="text-pink-600">AtunLaundry</span>
        </h1>
        <p class="text-lg md:text-xl text-pink-700 mb-10 animate-fade-in delay-200">
            Solusi laundry cepat, bersih, dan terpercaya. Wangi segar setiap saat! 🌸
        </p>
        <a href="#why-us"
           class="inline-flex items-center justify-center bg-pink-500 text-white px-8 py-4 rounded-full font-semibold hover:bg-pink-600 transition transform hover:scale-110 shadow-lg">
            <i class="fas fa-heart mr-2 animate-bounce"></i> Kenapa Kami?
        </a>
    </div>
</section>

<!-- 🌟 Why Choose Us -->
<section id="why-us" class="bg-gradient-to-r from-pink-50 via-pink-100 to-pink-200 py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-pink-800 mb-14">Kenapa Pilih <span class="text-pink-600">AtunLaundry?</span></h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all">
                <i class="fas fa-bolt text-pink-500 text-5xl mb-5"></i>
                <h3 class="text-xl font-semibold text-pink-700 mb-3">Cepat & Efisien</h3>
                <p class="text-pink-600">Laundry kamu selesai lebih cepat tanpa mengorbankan kualitas.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all">
                <i class="fas fa-hand-sparkles text-pink-500 text-5xl mb-5"></i>
                <h3 class="text-xl font-semibold text-pink-700 mb-3">Bersih & Terpercaya</h3>
                <p class="text-pink-600">Kami gunakan bahan pembersih premium yang aman untuk semua jenis kain.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all">
                <i class="fas fa-tags text-pink-500 text-5xl mb-5"></i>
                <h3 class="text-xl font-semibold text-pink-700 mb-3">Harga Terjangkau</h3>
                <p class="text-pink-600">Layanan profesional dengan harga ramah di kantong.</p>
            </div>
        </div>
    </div>
</section>

<!-- 🧺 Services Section -->
<section id="services" class="max-w-7xl mx-auto px-4 py-24">
    <h2 class="text-4xl md:text-5xl font-bold text-pink-700 mb-16 text-center">Layanan Laundry Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
        @foreach($services as $service)
        <div class="bg-white rounded-3xl shadow-xl p-6 flex flex-col hover:shadow-2xl hover:scale-105 transition-transform duration-300">
            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="h-52 w-full object-cover rounded-2xl mb-5">
            <h3 class="text-2xl font-semibold text-pink-800 mb-2 flex items-center">
                <i class="fas fa-tshirt text-pink-500 mr-2"></i> {{ $service->name }}
            </h3>
            <p class="text-pink-600 mb-4 font-semibold">Rp {{ number_format($service->price,0,',','.') }} / {{ $service->unit }}</p>
            <form action="{{ url('/customer/order') }}" method="POST" class="mt-auto">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                <input type="number" name="quantity" value="1" min="1" class="w-full mb-3 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-pink-300">
                <button type="submit" class="bg-pink-400 text-white py-2 px-4 rounded-lg hover:bg-pink-500 w-full font-semibold flex items-center justify-center gap-2 transition-transform transform hover:scale-105">
                    <i class="fas fa-shopping-basket"></i> Pesan Sekarang
                </button>
            </form>
        </div>
        @endforeach
    </div>
</section>


<!-- 💬 Pelanggan Kami -->
<section class="py-20 bg-gradient-to-br from-pink-200 via-pink-320 to-pink-100">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-4xl font-bold text-pink-600 mb-14 drop-shadow-lg">Apa Kata Pelanggan Kami?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-2">
                <img src="https://i.pravatar.cc/100?img=5" class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-pink-300">
                <h3 class="text-pink-700 font-semibold text-lg mb-2">Siti Aisyah</h3>
                <p class="text-pink-600 italic">“Pelayanannya cepat banget! Baju saya jadi wangi dan rapi, suka banget 💕”</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-2">
                <img src="https://i.pravatar.cc/100?img=8" class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-pink-300">
                <h3 class="text-pink-700 font-semibold text-lg mb-2">Dewi Lestari</h3>
                <p class="text-pink-600 italic">“Layanan antar-jemputnya memudahkan banget, cocok buat saya yang sibuk 😍”</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-2">
                <img src="https://i.pravatar.cc/100?img=11" class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-pink-300">
                <h3 class="text-pink-700 font-semibold text-lg mb-2">Rina Anggraini</h3>
                <p class="text-pink-600 italic">“Harga terjangkau tapi hasilnya bersih banget, recommended banget!”</p>
            </div>
        </div>
    </div>
</section>

<!-- 🗺️ Map Section -->
<section class="py-20 from-white-200">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-pink-800 mb-10">Temukan Kami</h2>
        <p class="text-pink-600 mb-6">Kunjungi AtunLaundry terdekat dari lokasi kamu dan nikmati layanan langsung!</p>
        <div class="rounded-3xl overflow-hidden shadow-xl mx-auto w-full md:w-3/4 hover:shadow-2xl hover:scale-105 transition-all duration-300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7834736889495!2d100.63769777347316!3d-0.23946493537476196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2ab50f2876cecb%3A0xbdd03017fb0b7f4a!2sNaura%20LAUNDRY!5e0!3m2!1sen!2sid!4v1760534974030!5m2!1sen!2sid" width="750" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>


@endsection