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

                        <h5 class="fw-bold mt-4 mb-1">Forgot Password?</h5>
                        <p class="text-secondary small mb-0">
                            Jangan khawatir! Masukkan email akun Anda untuk menerima link reset password.
                        </p>
                    </div>

                    {{-- Session Status --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">Email</label>
                            <input id="email" type="email" name="email" class="form-control rounded-3 py-2"
                                value="{{ old('email') }}" placeholder="nama@email.com" required autofocus
                                autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-dark w-100 rounded-pill py-2 fw-medium">
                            Send Password Reset Link
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-guest-layout>