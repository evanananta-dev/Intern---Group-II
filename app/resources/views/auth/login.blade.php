<x-guest-layout>
    @section('content')
        <div class="min-vh-100 d-flex justify-content-center align-items-center px-3">
            <div class="card border rounded-4 shadow-sm w-100" style="max-width: 440px;">
                <div class="card-body p-4 p-md-5">

                    {{-- Logo di tengah --}}
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}"
                            class="fw-bold fs-4 d-inline-flex align-items-center gap-2 text-dark text-decoration-none">
                            <span class="bg-dark text-white rounded-3 px-2 py-1 fs-6">RG</span>
                            <span>RentGo</span>
                        </a>

                        <h5 class="fw-bold mt-4 mb-1">Log In</h5>
                        <p class="text-secondary small mb-0">Silakan masuk ke akun RentGo Anda.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">Email</label>
                            <input id="email" type="email" name="email" class="form-control rounded-3 py-2"
                                value="{{ old('email') }}" placeholder="nama@email.com" required autofocus
                                autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-medium">Password</label>
                            <input id="password" type="password" name="password" class="form-control rounded-3 py-2"
                                placeholder="Masukkan password" required autocomplete="current-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        {{-- Remember Me dan Forgot Password --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                                <label for="remember_me" class="form-check-label small text-secondary">Remember me</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none small text-dark">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-dark w-100 rounded-pill py-2 fw-medium">Log In</button>
                    </form>

                </div>
            </div>
        </div>
    @endsection
</x-guest-layout>