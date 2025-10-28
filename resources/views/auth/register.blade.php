<x-guest-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Registrasi</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                                <input id="name" class="form-control form-control-lg" type="text" name="name"
                                    value="{{ old('name') }}" required autofocus autocomplete="name"
                                    placeholder="Masukkan nama Anda" />
                                @error('name')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email Address --}}
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Alamat Email</label>
                                <input id="email" class="form-control form-control-lg" type="email" name="email"
                                    value="{{ old('email') }}" required autocomplete="username"
                                    placeholder="Masukkan email Anda" />
                                @error('email')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Kata Sandi</label>
                                <input id="password" class="form-control form-control-lg" type="password"
                                    name="password" required autocomplete="new-password"
                                    placeholder="Buat kata sandi" />
                                @error('password')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Kata Sandi</label>
                                <input id="password_confirmation" class="form-control form-control-lg" type="password"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Ketik ulang kata sandi" />
                                @error('password_confirmation')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end align-items-center mt-4 pt-2">
                                <a class="text-decoration-none small" href="{{ route('login') }}">
                                    {{ __('Sudah terdaftar?') }}
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg ms-4">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>