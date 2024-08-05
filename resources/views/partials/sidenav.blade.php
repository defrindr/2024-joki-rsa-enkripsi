<div class="main-menu">
    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="index.html" class="logo-light">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="logo-lg" height="28">
            <img src="{{ asset('assets/images/icon.png') }}" alt="small logo" class="logo-sm" height="28">
        </a>

        <!-- Brand Logo Dark -->
        <a href="index.html" class="logo-dark">
            <img src="assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="28">
            <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
        </a>
    </div>

    <!--- Menu -->
    <div data-simplebar>
        <ul class="app-menu">

            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text"> Dashboard </span>
                    <span class="badge bg-primary rounded ms-auto">01</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('pelanggan.index') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-group"></i></span>
                    <span class="menu-text"> Pelanggan </span>
                </a>
            </li>
            {{-- <li class="menu-item">
                <a href="index.html" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-store"></i></span>
                    <span class="menu-text"> Penjualan </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="index.html" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-transfer"></i></span>
                    <span class="menu-text"> Transaksi Penjualan </span>
                </a>
            </li> --}}
            <li class="menu-item">
                <a href="{{ route('produk.index') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-package"></i></span>
                    <span class="menu-text"> Produk </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('penjualan.index') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-package"></i></span>
                    <span class="menu-text"> Penjualan </span>
                </a>
            </li>
            {{-- <li class="menu-item">
                <a href="#menuMaps" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-map-alt"></i></span>
                    <span class="menu-text"> Rute </span>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
