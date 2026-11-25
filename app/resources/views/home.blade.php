@extends('../layouts/layout')
@section('title', 'Home | RentGo')
@section('content')

    <!-- 2. Hero Section Singkat & Rapi -->
    <header class="py-5 my-md-4 bg-white">
        <div class="container py-4 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2 mb-3 fw-medium">
                        <i class="bi bi-check-circle-fill text-success me-1"></i> Lepas Kunci & Dengan Supir
                    </span>
                    <h1 class="display-5 fw-bold mb-3">
                        Sewa Mobil & Motor Jadi Lebih Mudah
                    </h1>
                    <p class="lead text-secondary mb-4 fs-6">
                        Armada bersih dan terawat, harga transparan tanpa biaya tersembunyi, serta proses pemesanan
                        praktis hanya dalam beberapa klik.
                    </p>
                    <a href="#katalog" class="btn btn-dark btn-lg rounded-pill px-5 py-3 fs-6 fw-medium shadow-sm">
                        Lihat Armada <i class="bi bi-arrow-down-short ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- 3. Katalog Armada Statis -->
    <main id="katalog" class="py-5 bg-light border-top grow">
        <div class="container py-2">
            <!-- Judul Katalog -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 pb-2">
                <div>
                    <h2 class="h4 fw-bold mb-1">Pilihan Armada Kami</h2>
                    <p class="text-secondary small mb-0">Tersedia unit mobil dan motor siap pakai untuk berbagai
                        kebutuhan perjalanan Anda</p>
                </div>
                <div class="mt-2 mt-md-0">
                    <span class="badge bg-white text-dark border rounded-pill px-3 py-2 fw-normal">
                        <i class="bi bi-car-front me-1"></i> {{ $totalMobil }} Mobil &nbsp;•&nbsp;
                        <i class="bi bi-bicycle me-1"></i> {{ $totalMotor }} Motor
                    </span>
                </div>
            </div>

            <!-- Grid Kartu Armada -->
            <div class="row g-4">

                @foreach ($products as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                            <div class="position-relative ratio ratio-16x9 bg-secondary-subtle">
                                <img src="{{ asset('storage/' . $item->image) }}" class="object-fit-cover w-100 h-100"
                                    alt="{{ $item->name }}">
                            </div>

                            <div class="card-body p-4 d-flex flex-column">

                                <div class="mb-2">
                                    <span class="badge bg-dark-subtle text-dark rounded-pill px-3 py-1">
                                        {{ $item->category->name }}
                                    </span>
                                </div>

                                <h3 class="h5 fw-bold mb-1">
                                    <a href="{{ route('products.show', $item->id) }}"
                                        class="text-dark text-decoration-none stretched-link">
                                        {{ $item->name }}
                                    </a>
                                </h3>

                                <p class="text-secondary small mb-3">
                                    {{ $item->description }}
                                </p>

                                <div class="d-flex gap-3 text-secondary small mb-4 pb-3 border-bottom">
                                    <span>{{ $item->transmission }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <div>
                                        <span class="text-secondary small d-block">Harga sewa</span>
                                        <span class="fw-bold fs-5 text-dark">
                                            Rp {{ number_format($item->price_per_day, 0, ',', '.') }}
                                        </span>
                                        <span class="text-secondary small">/hari</span>
                                    </div>

                                    <button type="button" class="btn btn-dark rounded-pill px-4 position-relative"
                                        style="z-index: 2;">
                                        Booking
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center align-items-center gap-3 mt-5">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </main>
@endsection