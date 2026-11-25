<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top py-3">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold fs-4 d-flex align-items-center gap-2 text-dark" href="{{ route('home') }}">
            <span class="bg-dark text-white rounded-3 px-2 py-1 fs-6">RG</span>
            <span>RentGo</span>
        </a>

        {{-- Tombol burger (hanya tampil di HP) --}}
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
            <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-2 mt-3 mt-md-0">

                @guest
                    <button type="button" class="btn btn-outline-dark rounded-pill px-4 fw-medium" data-bs-toggle="modal"
                        data-bs-target="#SignInModal">
                        Sign In
                    </button>

                    <button type="button" class="btn btn-dark rounded-pill px-4 fw-medium" data-bs-toggle="modal"
                        data-bs-target="#LoginModal">
                        Log in
                    </button>
                @endguest

                @auth
                    {{-- Dashboard: hanya admin --}}
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}"
                            class="btn btn-dark rounded-pill px-4 fw-medium d-inline-flex justify-content-center align-items-center gap-2">
                            <span>Dashboard</span>
                        </a>
                    @endif

                    {{-- Profile: semua pengguna login --}}
                    <a href="{{ route('profile.edit') }}"
                        class="btn btn-outline-dark rounded-circle d-inline-flex justify-content-center align-items-center p-0"
                        style="width: 40px; height: 40px;" title="Profile" aria-label="Profile">
                        <i class="bi bi-person-fill fs-5"></i>
                    </a>
                @endauth

            </div>
        </div>

    </div>
</nav>

<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">

            {{-- Header --}}
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div class="w-100">

                    {{-- Logo dan Close Button --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <a href="{{ route('home') }}"
                            class="navbar-brand fw-bold fs-4 d-flex align-items-center gap-2 text-dark mb-0">

                            <span class="bg-dark text-white rounded-3 px-2 py-1 fs-6">
                                RG
                            </span>

                            <span>RentGo</span>
                        </a>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>

                    </div>

                    {{-- Title --}}
                    <div>
                        <h5 class="modal-title fw-bold mb-1" id="LoginModalLabel">
                            Log In
                        </h5>

                        <p class="text-secondary small mb-0">
                            Silakan masuk ke akun RentGo Anda.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Body --}}
            <div class="modal-body p-4">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">
                            Email
                        </label>

                        <input id="email" type="email" name="email" class="form-control rounded-3 py-2"
                            value="{{ old('email') }}" placeholder="nama@email.com" required autofocus
                            autocomplete="username">

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label fw-medium">
                            Password
                        </label>

                        <input id="password" type="password" name="password" class="form-control rounded-3 py-2"
                            placeholder="Masukkan password" required autocomplete="current-password">

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Remember Me dan Forgot Password --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div class="form-check">
                            <input id="remember_me" type="checkbox" name="remember" class="form-check-input">

                            <label for="remember_me" class="form-check-label small text-secondary">
                                Remember me
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none small text-dark">
                                Forgot password?
                            </a>
                        @endif

                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-dark w-100 rounded-pill py-2 fw-medium">
                        Log In
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="SignInModal" tabindex="-1" aria-labelledby="SignInModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">

            {{-- Header --}}
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div class="w-100">

                    {{-- Logo dan Close Button --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <a href="{{ route('home') }}"
                            class="navbar-brand fw-bold fs-4 d-flex align-items-center gap-2 text-dark mb-0">

                            <span class="bg-dark text-white rounded-3 px-2 py-1 fs-6">
                                RG
                            </span>

                            <span>RentGo</span>
                        </a>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>

                    </div>

                    {{-- Title --}}
                    <div>
                        <h5 class="modal-title fw-bold mb-1" id="SignInModalLabel">
                            Create Account
                        </h5>

                        <p class="text-secondary small mb-0">
                            Buat akun RentGo untuk mulai menyewa kendaraan.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Body --}}
            <div class="modal-body p-4">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium">
                            Nama
                        </label>

                        <input id="name" type="text" name="name" class="form-control rounded-3 py-2"
                            value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required autofocus
                            autocomplete="name">

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">
                            Email
                        </label>

                        <input id="email" type="email" name="email" class="form-control rounded-3 py-2"
                            value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="username">

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label fw-medium">
                            Password
                        </label>

                        <input id="password" type="password" name="password" class="form-control rounded-3 py-2"
                            placeholder="Masukkan password" required autocomplete="new-password">

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-medium">
                            Konfirmasi Password
                        </label>

                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control rounded-3 py-2" placeholder="Ulangi password" required
                            autocomplete="new-password">

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    {{-- Already Registered --}}
                    <div class="text-end mb-3">
                        <a href="#" class="text-decoration-none small text-dark" data-bs-toggle="modal"
                            data-bs-target="#LoginModal" data-bs-dismiss="modal">
                            Already registered?
                        </a>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-dark w-100 rounded-pill py-2 fw-medium">
                        Create Account
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>