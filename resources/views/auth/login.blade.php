<x-guest-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Login User</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- Email Address --}}
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input id="email" class="form-control form-control-lg" type="email" name="email"
                                    value="{{ old('email') }}" required autofocus autocomplete="username"
                                    placeholder="Masukkan email Anda" />
                                @error('email')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <input id="password" class="form-control form-control-lg" type="password"
                                    name="password" required autocomplete="current-password"
                                    placeholder="Masukkan kata sandi" />
                                @error('password')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Remember Me --}}
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                <label class="form-check-label" for="remember_me">
                                    {{ __('Ingat Saya') }}
                                </label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4 pt-2">
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none small" href="{{ route('password.request') }}">
                                        {{ __('Lupa Kata Sandi?') }}
                                    </a>
                                @endif
                                
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Masuk') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>