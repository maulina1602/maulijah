<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <!-- Sidenav Menu Heading (Account)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <div class="sidenav-menu-heading d-sm-none">Account</div>
                    <!-- Sidenav Link (Alerts)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="bell"></i></div>
                        Alerts
                        <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                    </a>
                    <!-- Sidenav Link (Messages)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Messages
                        <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                    </a>
                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Navigation</div>
                    <!-- Sidenav Accordion (Dashboard)-->
                    <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i data-feather="command"></i></div>
                        Dashboard
                    </a>
                    <!-- Sidenav Heading (Addons)-->
                    <div class="sidenav-menu-heading">Main</div>
                    <!-- Sidenav Link (Charts)-->
                    <a class="nav-link" href="{{ route('dosen.index') }}">
                        <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                        Data Dosen
                    </a>
                    <a class="nav-link" href="{{ route('jurusan.index') }}">
                        <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                        Data Jurusan
                    </a>
                    <!-- Sidenav Link (Tables)-->
                    <a class="nav-link" href="{{ route('kelas.index') }}">
                        <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                        Data Kelas
                    </a>
                    <a class="nav-link" href="{{ route('mahasiswa.index') }}">
                        <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                        Data Mahasiswa
                    </a>
                    <div class="sidenav-menu-heading">Transaction</div>
                    <a class="nav-link" href="{{ route('kelasdetail.index') }}">
                        <div class="nav-link-icon"><i data-feather="codesandbox"></i></div>
                        Proses Mahasiswa
                    </a>
                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </nav>
    </div>
