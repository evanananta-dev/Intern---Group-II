<x-guest-layout>
    @section('content')
        <div class="min-vh-100 d-flex justify-content-center align-items-center px-3 py-4">
            <div class="card border rounded-4 shadow-sm w-100" style="max-width: 440px;">
                <div class="card-body p-4 p-md-5">

                    {{-- Logo di tengah --}}
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}"
                            class="fw-bold fs-4 d-inline-flex align-items-center gap-2 text-dark text-decoration-none">
                            <span class="bg-dark text-white rounded-3 px-2 py-1 fs-6">RG</span>
                            <span>RentGo</span>
                        </a>

                        <h5 class="fw-bold mt-4 mb-1">Create Account</h5>
                        <p class="text-secondary small mb-0">Buat akun RentGo untuk mulai menyewa kendaraan.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-medium">Nama</label>
                            <input id="name" type="text" name="name" class="form-control rounded-3 py-2"
                                value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required autofocus
                                autocomplete="name">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">Email</label>
                            <input id="email" type="email" name="email" class="form-control rounded-3 py-2"
                                value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-medium">Password</label>
                            <input id="password" type="password" name="password" class="form-control rounded-3 py-2"
                                placeholder="Masukkan password" required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-medium">Konfirmasi Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="form-control rounded-3 py-2" placeholder="Ulangi password" required
                                autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        {{-- Already registered --}}
                        <div class="d-flex justify-content-end align-items-center mb-4">
                            <a href="{{ route('login') }}" class="text-decoration-none small text-dark">
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
    @endsection
</x-guest-layout>