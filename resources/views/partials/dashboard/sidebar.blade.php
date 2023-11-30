<!-- Sidebar -->
@php
    $routename = request()
        ->route()
        ->getName();
    $role = json_decode(Cookie::get('user'))->role->name;

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
                {{-- USER --}}
                @if ($role == 'USER')
                    <li class="nav-item ml-3 {{ $routename == 'hall-profile' ? 'active' : '' }}">
                        <a href="{{ route('hall-profile') }}">
                            <i class="fas fa-door-open"></i>
                            <p>Profile Balai</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'hall-contact' ? 'active' : '' }}">
                        <a href="{{ route('hall-contact') }}">
                            <i class="fas fa-envelope"></i>
                            <p>Kontak Balai</p>
                        </a>
                    </li>
                @endif

                {{-- ADMIN --}}
                @if ($role == 'ADMIN')
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
                @endif

                {{-- PUBLIC --}}
                <li class="nav-item ml-3 {{ $routename == 'news' ? 'active' : '' }}">
                    <a href="{{ route('news') }}">
                        <i class="fas fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>


                {{-- ADMIN --}}
                @if ($role == 'ADMIN')
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
                    <li class="nav-item ml-3 {{ $routename == 'count-information' ? 'active' : '' }}"">
                        <a href="{{ route('count-information') }}">
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
                    <li class="nav-item ml-3 {{ $routename == 'official-ppid' ? 'active' : '' }}">
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
                    <li class="nav-item ml-3 {{ $routename == 'video' ? 'active' : '' }}">
                        <a href="{{ route('video') }}">
                            <i class="fas fa-video"></i>
                            <p>Video</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item ml-3 {{ $routename == 'agenda' ? 'active' : '' }}">
                    <a href="{{ route('agenda') }}">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Agenda</p>
                    </a>
                </li>
                <li class="nav-item ml-3 {{ $routename == 'download' ? 'active' : '' }}">
                    <a href="{{ route('download') }}">
                        <i class="fas fa-download"></i>
                        <p>Download</p>
                    </a>
                </li>

                {{-- ADMIN --}}
                @if ($role == 'ADMIN')
                    <li
                        class="nav-item ml-3 {{ $routename == 'regulation' || $routename == 'regulation-file' ? 'active' : '' }}">
                        <a href="{{ route('regulation') }}">
                            <i class="fas fa-file-alt"></i>
                            <p>Regulasi</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'link' ? 'active' : '' }}">
                        <a href="{{ route('link') }}">
                            <i class="fas fa-external-link-alt"></i>
                            <p>Link Terkait</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'contact-us' ? 'active' : '' }}">
                        <a href="{{ route('contact-us') }}">
                            <i class="fas fa-envelope"></i>
                            <p>Hubungi Kami</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'user' ? 'active' : '' }}">
                        <a href="{{ route('user') }}">
                            <i class="fas fa-users-cog"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'review' ? 'active' : '' }}">
                        <a href="{{ route('review') }}">
                            <i class="fas fa-book-open"></i>
                            <p>Testimoni</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'setting' ? 'active' : '' }}">
                        <a href="{{ route('setting') }}">
                            <i class="fas fa-cog"></i>
                            <p>Setting</p>
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
                    <li class="nav-item ml-3 {{ $routename == 'profile' ? 'active' : '' }}">
                        <a href="{{ route('profile') }}">
                            <i class="fas fa-user"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'history' ? 'active' : '' }}">
                        <a href="{{ route('history') }}">
                            <i class="fas fa-book"></i>
                            <p>Sejarah</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'vision' ? 'active' : '' }}">
                        <a href="{{ route('vision') }}">
                            <i class="fas fa-eye"></i>
                            <p>Visi Misi</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'tupoksi' ? 'active' : '' }}">
                        <a href="{{ route('tupoksi') }}">
                            <i class="fas fa-tasks"></i>
                            <p>Tupoksi</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'organization' ? 'active' : '' }}">
                        <a href="{{ route('organization') }}">
                            <i class="fas fa-sitemap"></i>
                            <p>Struktur Organisasi</p>
                        </a>
                    </li>
                    <li class="nav-item ml-3 {{ $routename == 'official' ? 'active' : '' }}">
                        <a href="{{ route('official') }}">
                            <i class="fas fa-id-card"></i>
                            <p>Profil Pejabat</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item ml-3 {{ $routename == 'account' ? 'active' : '' }}">
                    <a href="{{ route('account') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Setting Akun</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Logout</h4>
                </li>
                <li class="nav-item ml-3">
                    <a href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
