<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
                <img src="./static/logo.svg" width="110" height="32" alt="Menu" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item d-none d-lg-flex me-3">
                <div class="btn-list">
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="mt-1 small text-secondary">{{ auth()->user()->email }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item @if (request()->routeIs('dashboard')) active @endif">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-home icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Home
                        </span>
                    </a>
                </li>
                <span class="ms-3 text-secondary mt-3 mb-1">Data</span>
                <li class="nav-item @if (request()->routeIs('satuans.*')) active @endif">
                    <a class="nav-link" href="{{ route('satuans.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-box-padding icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Satuan
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('kategori.*')) active @endif">
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-category-2 icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Kategori
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('barang.index')) active @endif">
                    <a class="nav-link" href="{{ route('barang.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-notebook icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang
                        </span>
                    </a>
                </li>
                <span class="ms-3 text-secondary mt-3 mb-1">Info Supplier</span>
                <li class="nav-item @if (request()->routeIs('pelanggan.*')) active @endif">
                    <a class="nav-link" href="{{ route('pelanggan.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-address-book icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Pelanggan
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('pemasok.*')) active @endif">
                    <a class="nav-link" href="{{ route('pemasok.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-phone-call icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Supplier
                        </span>
                    </a>
                </li>
                <span class="ms-3 text-secondary mt-3 mb-1">Transaksi</span>
                <li class="nav-item @if (request()->routeIs('barang-masuk.index') ||
                        request()->routeIs('barang-masuk.create') ||
                        request()->routeIs('barang-masuk.edit') ||
                        request()->routeIs('barang-masuk.show')) active @endif">
                    <a class="nav-link" href="{{ route('barang-masuk.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-transfer-in icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang Masuk
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('barang-keluar.*')) active @endif">
                    <a class="nav-link" href="{{ route('barang-keluar.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-transfer-out icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang Keluar
                        </span>
                    </a>
                </li>
                <span class="ms-3 text-secondary mt-3 mb-1">Detail</span>
                <li class="nav-item @if (request()->routeIs('barang-masuk.laporan')) active @endif">
                    <a class="nav-link" href="{{ route('barang-masuk.laporan') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-report-analytics icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang Masuk
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('barang-keluar.laporan')) active @endif">
                    <a class="nav-link" href="{{ route('barang-keluar.laporan') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-transfer-out icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Barang Keluar
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
