<header>
    <div class="top-bar gray-f5f5-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <ul class="list-inline top-nav">
                        <li><a class="text-uppercase" href="{{ route('home-contact') }}">Hubungi Kami</a>|</li>
                        <li><a class="text-uppercase" href="{{ route('home-news') }}">Berita </a>|</li>
                        <li><a class="text-uppercase" href="{{ route('home-agenda') }}">Agenda</a>|</li>
                        <li><a class="text-uppercase" href="{{ route('home-list-regulation') }}">Regulasi</a>|</li>
                        <li><a class="text-uppercase" href="{{ route('home-download') }}">Unduh</a>|</li>
                        <li><a class="text-uppercase" href="{{ route('information-and-formulir') }}">Informasi &
                                Formulir</a>|</li>
                    </ul>
                </div>
                <div class="col-md-3 top-social">
                    <a href="{{ $meta->facebook }}" class="fa fa-facebook"></a>
                    <a href="{{ $meta->twitter }}" class="fa fa-twitter"></a>
                    <a href="{{ $meta->instagram }}" class="fa fa-instagram"></a>
                    {{-- <a href="{{ $meta->youtube }}" class="fa fa-youtube"></a> --}}
                    <a class="fa fa-search" id="btnSearch" data-toggle="modal" data-target="#searchModal"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-5 text-center logo">
                <img class="img-responsive" src="{{ asset('frontend/img/esdmjateng.png') }}" alt="">
            </div>
            <div class="col-md-7">
                <div class="top-contact-details">
                    <div class="row mt-20">
                        <div class="col-md-6 col-xs-12">
                            <div class="clearfix border-r">
                                <img class="img-responsive pull-left t-contact-img"
                                    src="{{ asset('frontend/img/call.png') }}" alt="">
                                <div class="t-contact-info ubuntu pull-left">
                                    <span class="fz-14 gray-999">Telpon </span>
                                    <span class="fz-13">{{ $meta->web_phone }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="clearfix border-r">
                                <img class="img-responsive pull-left t-contact-img"
                                    src="{{ asset('frontend/img/email.png') }}" alt="">
                                <div class="t-contact-info ubuntu pull-left">
                                    <span class="fz-14 gray-999">Email</span>
                                    <span class="fz-13">{{ $meta->web_email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-nav mt-20">
        <div class="container">
            <div class="col-md-offset-5 col-md-7">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse no-margin no-padding">
                        <ul class="nav navbar-nav">
                            <li class=""><a href="{{ route('home') }}" class="main-menu">Home</a></li>
                            <li class="dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Profil <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/profil/profil-dinas">Profil Dinas</a></li>
                                    <li><a href="/profil/sejarah-dinas">Sejarah Dinas</a></li>
                                    <li><a href="/profil/visi-misi">Visi Misi</a></li>
                                    <li><a href="/profil/tupoksi">Tupoksi</a></li>
                                    <li><a href="/profil/struktur-organisasi">Struktur Organisasi</a></li>
                                    <li><a href="/profil/profil-pejabat">Profil Pejabat</a></li>
                                </ul>
                            </li>
                            <li class="dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Balai/UPT<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($halls as $hall)
                                        <li>
                                            <a
                                                href="{{ route('home-hall', ['id' => $hall->id, 'seo' => $hall->seo]) }}">{{ $hall->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Pengaduan<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="http://subsidi.djk.esdm.go.id"">Pengaduan Subsidi Listrik</a>
                                    </li>
                                    <li>
                                        <a href="https://ppidnew.esdm.jatengprov.go.id/formulir-pengaduan-asn">Pengaduan
                                            ASN</a>
                                    </li>
                                    <li>
                                        <a href="https://ppidnew.esdm.jatengprov.go.id/formulir-keberatan">Keberatan
                                            Informasi Publik</a>
                                    </li>
                                    <li>
                                        <a href="http://laporgub.jatengprov.go.id">LaporGub</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Portal Data<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($portalData as $pd)
                                        <li><a href="{{ $pd->url }}">{{ $pd->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Gallery<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('home-img-gallery') }}">Foto</a></li>
                                    <li><a href="{{ route('home-video-gallery') }}">Video</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </nav>
            </div>
        </div>
        <div class="ticker-container">
            <div class="ticker-caption">
                <p style="color:white">Breaking News</p>
            </div>
            <ul id="breaking-news">
                {{-- <div class="finished not-active" style="transition: all 0.25s ease-in-out 0s;">
                    <li style="width: 1750px;"><span>PEMBUKAAN PENDAFTARAN PENGANGKATAN DAN PENGAMBILAN
                            SUMPH AT JANJI ADVOKAT DI PENGADILAN TINGGI JAWA TENGAH </span></li>
                </div>
                <div class="finished ticker-active" style="transition: all 0.25s ease-in-out 0s;">
                    <li style="width: 1750px;"><span>PENGUMUMAN PENDAHULUAN UJIAN PROFESI ADVOKAT</span>
                    </li>
                </div>
                <div class="finished not-active" style="transition: all 0.25s ease-in-out 0s;">
                    <li style="width: 1750px;"><span>PENGUMUMAN PENDAHULUAN UJIAN PROFESI ADVOKAT</span>
                    </li>
                </div>
                <div class="finished not-active" style="transition: all 0.25s ease-in-out 0s;">
                    <li style="width: 1750px;"><span>Pengumuman Daftar Nama - nama Kartu Tanda Pengenal
                            Advokat ( KTPA ) PERADI</span></li>
                </div>
                <div class="finished not-active" style="transition: all 0.25s ease-in-out 0s;">
                    <li style="width: 1750px;"><span>Pengambilan Kartu Tanda Advokat PERADI Periode
                            2015-2018</span></li>
                </div> --}}
            </ul>
        </div>
    </div>
</header>
