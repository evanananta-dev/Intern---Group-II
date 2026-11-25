@extends('../layouts/layout')
@section('title', 'Detail | RentGo')
@section('content')

    @php
        $isMobil = optional($product->category)->name === 'Mobil';
        $imageUrl = $product->image
            ? asset('images/products/' . $product->image)
            : 'https://placehold.co/1200x675/f1f5f9/334155?text=' . urlencode($product->name);
    @endphp

    <!-- Konten Utama -->
    <main class="py-4 py-md-5 grow">
        <div class="container">

            <div class="mb-4">
                <a href="{{ route('home') }}"
                    class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-medium d-inline-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <div class="row g-4 g-lg-5 align-items-start">

                <!-- Kolom Kiri: Foto -->
                <div class="col-12 col-lg-6">
                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden bg-light border shadow-sm">
                        <img src="{{ $imageUrl }}"
                            onerror="this.src='https://placehold.co/1200x675/f1f5f9/334155?text=No+Image'"
                            class="object-fit-cover w-100 h-100" alt="{{ $product->name }}">
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-12 col-lg-6">
                    <div class="card border rounded-4 shadow-sm p-4">

                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-2 fw-medium">
                                <i class="bi {{ $isMobil ? 'bi-car-front-fill' : 'bi-bicycle' }} me-1"></i>
                                {{ $product->category->name ?? '-' }}
                            </span>

                            @if ($product->status === 'available')
                                <span
                                    class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2 fw-semibold">
                                    <i class="bi bi-check-circle-fill me-1"></i> Tersedia / Siap Sewa
                                </span>
                            @elseif ($product->status === 'rented')
                                <span
                                    class="badge bg-warning-subtle text-warning-emphasis border rounded-pill px-3 py-2 fw-semibold">
                                    <i class="bi bi-clock-fill me-1"></i> Sedang Disewa
                                </span>
                            @else
                                <span
                                    class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-2 fw-semibold">
                                    <i class="bi bi-wrench me-1"></i> Dalam Perawatan
                                </span>
                            @endif
                        </div>

                        <h1 class="h3 fw-bold mb-2">
                            {{ $product->name }}@if ($product->production_year) ({{ $product->production_year }})@endif
                        </h1>

                        <div class="bg-light rounded-4 p-3 mb-4 border">
                            <span class="text-secondary small d-block mb-1">Tarif Sewa Harian</span>
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="fs-3 fw-bold text-dark">
                                    Rp {{ number_format($product->price_per_day, 0, ',', '.') }}
                                </span>
                                <span class="text-secondary small">/ hari</span>
                            </div>
                        </div>

                        <h2 class="h6 fw-bold text-uppercase text-secondary mb-3">Spesifikasi Detail</h2>
                        <div class="row g-3 mb-4 pb-3 border-bottom small">
                            <div class="col-6">
                                <div class="text-secondary mb-1"><i class="bi bi-gear me-1"></i> Transmisi</div>
                                <div class="fw-semibold text-dark">{{ $product->transmission ?? '-' }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-secondary mb-1"><i class="bi bi-people me-1"></i> Penumpang</div>
                                <div class="fw-semibold text-dark">
                                    {{ $product->passenger_capacity ? $product->passenger_capacity . ' Orang' : '-' }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-secondary mb-1"><i class="bi bi-fuel-pump me-1"></i> Bahan Bakar</div>
                                <div class="fw-semibold text-dark">
                                    {{ $product->fuel_type ? ucfirst($product->fuel_type) : '-' }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-secondary mb-1"><i class="bi bi-calendar3 me-1"></i> Tahun</div>
                                <div class="fw-semibold text-dark">{{ $product->production_year ?? '-' }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-secondary mb-1"><i class="bi bi-speedometer2 me-1"></i> Mesin</div>
                                <div class="fw-semibold text-dark">{{ $product->engine ?? '-' }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-secondary mb-1"><i class="bi bi-card-text me-1"></i> Nomor Polisi</div>
                                <div class="fw-semibold text-dark">{{ $product->license_plate ?? '-' }}</div>
                            </div>
                        </div>

                        <h2 class="h6 fw-bold text-uppercase text-secondary mb-3">Syarat & Fasilitas</h2>
                        <div class="row g-2 mb-4 small text-secondary">
                            <div class="col-12 col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check2-circle text-success"></i>
                                    <span>{{ $isMobil ? 'Lepas Kunci / Dengan Supir' : 'Lepas Kunci' }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check2-circle text-success"></i>
                                    <span>Asuransi Perlindungan Dasar</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check2-circle text-success"></i>
                                    <span>Wajib e-KTP & {{ $isMobil ? 'SIM A' : 'SIM C' }} Aktif</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-check2-circle text-success"></i>
                                    <span>Antar-Jemput Area Kota</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            @if ($product->status === 'available')
                                <button type="button" class="btn btn-dark btn-lg rounded-pill py-3 fs-6 fw-semibold shadow-sm"
                                    data-bs-toggle="modal" data-bs-target="#bookingModal">
                                    Booking Sekarang
                                </button>
                            @else
                                <button type="button" class="btn btn-secondary btn-lg rounded-pill py-3 fs-6 fw-semibold"
                                    disabled>
                                    Tidak Tersedia
                                </button>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection