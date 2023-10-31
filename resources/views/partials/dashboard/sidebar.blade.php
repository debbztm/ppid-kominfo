<!-- Sidebar -->
@php
    $routename = request()
        ->route()
        ->getName();
@endphp
<div class="sidebar sidebar-style-2" data-background-color="{{ $sidebarColor }}">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item ml-3 {{ $routename == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master</h4>
                </li>
                <li class="nav-item ml-3 {{ $routename == 'hall' ? 'active' : '' }}">
                    <a href="{{ route('hall') }}">
                        <i class="fas fa-door-open"></i>
                        <p>Balai</p>
                    </a>
                </li>
                <li class="nav-item ml-3 {{ $routename == 'slide' ? 'active' : '' }}">
                    <a href="{{ route('slide') }}">
                        <i class="fas fa-images"></i>
                        <p>Slide</p>
                    </a>
                </li>
                <li class="nav-item ml-3 {{ $routename == 'news' ? 'active' : '' }}">
                    <a href="{{ route('news') }}">
                        <i class="fas fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item ml-3 {{ $routename == 'pages' ? 'active' : '' }}">
                    <a href="{{ route('pages') }}">
                        <i class="fas fa-money-bill-alt"></i>
                        <p>Home Anggaran</p>
                    </a>
                </li>
                <li class="nav-item ml-3 {{ $routename == 'infographic' ? 'active' : '' }}">
                    <a href="{{ route('infographic') }}">
                        <i class="fas fa-chart-bar"></i>
                        <p>Infografis</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-info-circle"></i>
                        <p>Jumlah Informasi</p>
                    </a>
                </li>
                <li class="nav-item ml-3 {{ $routename == 'portal-data' ? 'active' : '' }}">
                    <a href="{{ route('portal-data') }}">
                        <i class="fas fa-database"></i>
                        <p>Portal Data</p>
                    </a>
                </li>
                <li class="nav-item ml-3  {{ $routename == 'official-ppid' ? 'active' : '' }}">
                    <a href="{{ route('official-ppid') }}">
                        <i class="fas fa-users"></i>
                        <p>Pejabat PPID</p>
                    </a>
                </li>
                <li
                    class="nav-item ml-3  {{ $routename == 'gallery' || $routename == 'image-gallery' ? 'active' : '' }}">
                    <a href="{{ route('gallery') }}">
                        <i class="fas fa-camera"></i>
                        <p>Foto</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-video"></i>
                        <p>Video</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Agenda</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-download"></i>
                        <p>Download</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-file-alt"></i>
                        <p>Regulasi</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-external-link-alt"></i>
                        <p>Link Terkait</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-envelope"></i>
                        <p>Hubungi Kami</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-users-cog"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                {{-- <li class="nav-item ml-3">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Base</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Avatars</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/buttons.html">
                                    <span class="sub-item">Buttons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/gridsystem.html">
                                    <span class="sub-item">Grid System</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Management</h4>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-book"></i>
                        <p>Sejarah</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-eye"></i>
                        <p>Visi Misi</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-tasks"></i>
                        <p>Tupoksi</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-sitemap"></i>
                        <p>Struktur Organisasi</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-id-card"></i>
                        <p>Profil Pejabat</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Settings</h4>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-info"></i>
                        <p>Info Website</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-user-circle"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-share-alt"></i>
                        <p>Social Media</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-image"></i>
                        <p>Image</p>
                    </a>
                </li>
                <li class="nav-item ml-3">
                    <a href="#">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Maps</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
