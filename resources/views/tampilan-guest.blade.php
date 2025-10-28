<x-guest-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container text-center mt-5">
                    <h1 class="">Selamat datang di Perpustakaan</h1>
                    <p class="mt-3 fs-4 ">
                        Temukan dunia pengetahuan tanpa batas di ujung jari Anda.
                        Perpustakaan ini hadir untuk mendukung semangat belajar, riset, dan eksplorasi Anda
                        melalui koleksi buku, jurnal, dan sumber daya digital yang terus diperbarui.
                    </p>
                </div>
                @guest
                <div class="d-flex justify-content-center mt-4">
                    <a href="{{ route('login') }}" class="btn btn-primary me-2" role="button" aria-label="Login">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary" role="button"aria-label="Register">Register</a>
                </div>
                @endguest
            </div>
        </div>
    </div>
</x-guest-layout>