<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ url('') }}/assets/images/faces/1504122517.jpg" width="100" height="100"
                        alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ session()->get('nama') }}</span>
                    <span class="text-secondary text-small">Login as Admin</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/home') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/tambah-admin') }}">
                <span class="menu-title">Admin Perpus</span>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/data-buku') }}">
                <span class="menu-title">Data Buku</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/pinjam-buku') }}">
                <span class="menu-title">Pinjam Buku</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
        </li>

    </ul>
</nav>
