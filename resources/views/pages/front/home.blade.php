@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="container-fluid no-padding">
        <div class="main-slider">
            @foreach ($slide as $key => $slide)
                <div class="item">
                    <div class="main-slider-img position-r">
                        <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->title }}">
                        <div class="overlay"></div>
                        <div class="main-slider-content slide-2 text-center">
                            <h3 class="white text-uppercase mt-25 position-r">{{ $slide->title }}
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section class="recent-causes gray-f9f9-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="text-uppercase black h-sep">Informasi <span class="text-ultra-bold">Publik</span> </h3>
                    <p class="fz-16 gray-666 mt-50">Anggaran dan Keuangan</p>
                </div>
            </div>
            <div class="row mt-70">
                <div class="col-md-12">
                    <div class="causes">
                        @foreach ($hmanggaran as $hm)
                            <div class="item">
                                <div class="cause-content text-center">
                                    <h3 class="martel text-semi-bold d-black mb-5">{{ $hm->title }}</h3>
                                    <p class="lh-22 mt-10 mb-10">{{ $hm->description }}</p>
                                    <a class="fz-14 mt-20 btn-green-br"
                                        href="http://{{ $hm->url }}">Selengkapnya...</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="staff mt-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class=" black h-sep"> <span class="text-ultra-bold">Pejabat</span> </h3>
                    <p class="fz-16 gray-666 mt-50">PPID PEMBANTU DINAS ESDM JAWA TENGAH</p>
                </div>
            </div>
            <div class="row mt-60">
                @foreach ($officialppid as $ofc)
                    <div class="col-md-3 col-md-offset-1 staff-member position-r text-center col-sm-6">
                        <img class="img-responsive" src="{{ Storage::url($ofc->image) }}" alt="{{ $ofc->title1 }}">
                        <div class="staff-overlay">
                            <h6 class="white text-bold text-uppercase">{{ $ofc->title1 }}</h6>
                            <span
                                class=" mt-15 ubuntu white text-medium text-uppercase display-block fz-11">{{ $ofc->title2 }}</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="our-help mt-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class=" white h-sep">Permohonan <span class="text-ultra-bold">Informasi </span> </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 col-sm-0">
                </div>
                <div class="col-md-2 col-sm-6 mt-70">
                    <div id="canvas-holder" class="clearfix">
                        <div class="round-bar-status pull-left text-center">
                            <h2 class="white text-semi-bold">{{ $meta->application }}</h2>
                            <h5 class="fz-13 text-semi-bold white text-uppercase mt-10">Permohonan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 mt-70">
                    <div id="canvas-holder1" class="clearfix">
                        <div class="round-bar-status pull-left text-center">
                            <h2 class="white text-semi-bold">{{ $meta->granted }}</h2>
                            <h5 class="fz-13 text-semi-bold white text-uppercase mt-10">Dikabulkan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 mt-70">
                    <div id="canvas-holder2" class="clearfix">
                        <div class="round-bar-status pull-left text-center">
                            <h2 class="white text-semi-bold">{{ $meta->objected }}</h2>
                            <h5 class="fz-13 text-semi-bold white text-uppercase mt-10">Keberatan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 mt-70">
                    <div id="canvas-holder3" class="clearfix">
                        <div class="round-bar-status pull-left text-center">
                            <h2 class="white text-semi-bold">{{ $meta->rejected }}</h2>
                            <h5 class="fz-13 text-semi-bold white text-uppercase mt-10">Ditolak</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 mt-70">
                    <div id="canvas-holder" class="clearfix">
                        <div class="round-bar-status pull-left text-center">
                            <h2 class="white text-semi-bold">{{ $meta->ikm }}</h2>
                            <h5 class="fz-13 text-semi-bold white text-uppercase mt-10">IKM</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-0">
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class=" black h-sep"><span class="text-ultra-bold"> Berita</span> </h3>
                    <p class="fz-16 gray-666 mt-50">Berita terbaru dari ppid kominfo</p>
                </div>
            </div>
            <div class="row mt-100">
                <div class="col-md-12">
                    <div class="test-sldier">
                        @foreach ($news as $key => $news)
                            <div class="item">
                                <a href="berita/read/{{ $news->id }}/{{ $news->seo }}">
                                    <div class="test-img display-ib position-r pull-left">
                                        <img class="img-responsive display-ib" src="{{ Storage::url($news->image) }}"
                                            alt="">
                                    </div>
                                    <div class="display-ib pull-left test-text">
                                        <img src="{{ asset('frontend/img/quote-open.png') }}" alt="">
                                        <h4 class="fz-17 d-black text-bold mt-30">{{ $news->title }}</h4>
                                        <p class="mt-25">{!! Illuminate\Support\Str::limit($news->description, 150) !!}...</p>
                                        <img class="pull-right mt-30" src="{{ asset('frontend/img/quote-close.png') }}"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
