@php
    auth()->user()->role == 1 ? $role = 'admin' : $role = 'user';
@endphp
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="index.html">
            <img src="/assets/images/logo.png" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Fameran House</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">DASHBOARD</li>
        <li id="beranda-menu">
            <a
                href="{{ route($role.'.beranda') }}"
            >
                <i style="width: 20px" class="zmdi zmdi-store-24"></i> <span>Beranda</span>
            </a>
        </li>
        <li>
            <a href="index.html">
                <i style="width: 20px" class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        @if(auth()->user()->role == 1)
            <li class="sidebar-header">Web Pages</li>
            <li>
                <a href="icons.html">
                    <i style="width: 20px" class="zmdi zmdi-settings"></i> <span>Landing Page Settings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.web.portofolio.index') }}">
                    <i style="width: 20px" class="zmdi zmdi-apps"></i> <span>Portofolio</span>
                </a>
            </li>
            <li id="web-kotak-masuk">
                <a href="{{ route('admin.web.kotak-masuk.index') }}">
                    <i style="width: 20px" class="zmdi zmdi-comment-alt-text"></i> <span>Kotak Masuk</span>
                </a>
            </li>
            <li>
                <a href="icons.html">
                    <i style="width: 20px" class="zmdi zmdi-trending-up"></i> <span>Progres Pesanan</span>
                </a>
            </li>
        @endif
    </ul>
</div>
