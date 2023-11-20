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
                            <li class=""><a href="index.html">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Profil Dinas</a></li>
                                    <li><a href="">Sejarah Dinas</a></li>
                                    <li><a href="">Visi Misi</a></li>
                                    <li><a href="">Tupoksi</a></li>
                                    <li><a href="">Struktur Organisasi</a></li>
                                    <li><a href="">Profil Pejabat</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Balai/UPT <span
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
                            <li><a class="" href="#">Berita </a></li>
                            <li><a class="" href="gallery.html">Gallery</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pengaduan <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog.html">Pengaduan Subsidi Listrik</a></li>
                                    <li><a href="blog-single.html">Pengaduan ASN</a></li>
                                    <li><a href="blog-single.html">Keberatan Informasi Publik</a></li>
                                    <li><a href="blog-single.html">LaporGub</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Portal Data <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($portalData as $pd)
                                        <li><a href="{{ $pd->url }}">{{ $pd->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Regulasi <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($regulations as $rg)
                                        @if ($rg->is_url == '1')
                                            <li><a href="{{ $rg->url }}">{{ $rg->title }}</a></li>
                                        @else
                                            <li><a href="regulation/{{ $rg->seo }}">{{ $rg->title }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li><a class="green-nav" href="">Unduh</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Gallery <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Foto</a></li>
                                    <li><a href="">Video</a></li>
                                </ul>
                            </li>
                            <li><a class="green-nav" href="">Hubungi Kami</a></li>

                        </ul>
                    </div><!--/.nav-collapse -->
                </nav>
            </div>
        </div>
    </div>
</header>
