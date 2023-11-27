<header>
    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-5 text-center logo">
                <img class="img-responsive" src="{{ asset('frontend/img/esdmjateng.png') }}" alt="">
            </div>
            <div class="col-md-7">
                <div class="top-contact-details">
                    <div class="row mt-20">
                        <div class="col-md-4">
                            <div class="clearfix border-r">
                                <img class="img-responsive pull-left t-contact-img"
                                    src="{{ asset('frontend/img/call.png') }}" alt="">
                                <div class="t-contact-info ubuntu pull-left">
                                    <span class="gray-999" style="font-size: 12px">Call Us Now </span>
                                    <span class="" style="font-size: 10px">{{ $meta->web_phone }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="clearfix border-r">
                                <img class="img-responsive pull-left t-contact-img"
                                    src="{{ asset('frontend/img/email.png') }}" alt="">
                                <div class="t-contact-info ubuntu pull-left">
                                    <span class="gray-999" style="font-size: 12px">Email us</span>
                                    <span class="" style="font-size: 10px">{{ $meta->web_email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-nav mt-30">
        <div class="container">
            <div class="col-md-12">
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Profil <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/profile/profil-dinas">Profil Dinas</a></li>
                                    <li><a href="/profile/sejarah-dinas">Sejarah Dinas</a></li>
                                    <li><a href="/profile/visi-misi">Visi Misi</a></li>
                                    <li><a href="/profile/tupoksi">Tupoksi</a></li>
                                    <li><a href="/profile/organisasi">Struktur Organisasi</a></li>
                                    <li><a href="/profile/profil-pejabat">Profil Pejabat</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Balai/UPT <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($halls as $hall)
                                        <li>
                                            <a
                                                href="balai/profil/{{ $hall->id }}/{{ $hall->seo }}">{{ $hall->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a class="main-menu" href="#">Berita </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Pengaduan <span
                                        class="caret "></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="http://subsidi.djk.esdm.go.id"">Pengaduan Subsidi Listrik</a></li>
                                    <li><a href="https://ppidnew.esdm.jatengprov.go.id/formulir-pengaduan-asn">Pengaduan
                                            ASN</a></li>
                                    <li><a href="https://ppidnew.esdm.jatengprov.go.id/formulir-keberatan">Keberatan
                                            Informasi Publik</a></li>
                                    <li><a href="http://laporgub.jatengprov.go.id">LaporGub</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Portal Data <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($portalData as $pd)
                                        <li><a href="{{ $pd->url }}">{{ $pd->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Regulasi <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($regulations as $reg)
                                        @if ($reg->is_url == '1')
                                            <li><a href="{{ $reg->url }}">{{ $reg->title }}</a></li>
                                        @else
                                            <li><a href="regulation/{{ $reg->seo }}">{{ $reg->title }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li><a class="main-menu" href="{{ route('home-download') }}">Unduh</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle main-menu" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Gallery <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Foto</a></li>
                                    <li><a href="">Video</a></li>
                                </ul>
                            </li>
                            <li><a class="main-menu" href="{{ route('home-contact') }}">Hubungi Kami</a></li>
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
            <ul>
                <div class="finished not-active" style="transition: all 0.25s ease-in-out 0s;">
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
                </div>
            </ul>
        </div>
    </div>
</header>
