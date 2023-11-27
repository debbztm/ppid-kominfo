@extends('layouts.app')
@section('title', $title)
@push('styles')
    <style>
        .test-sldier.banner>.owl-wrapper-outer>.owl-wrapper>.owl-item {
            width: 285px !important;
        }

        iframe {
            width: 100%;
            aspect-ratio: 16 / 10;
        }
    </style>
@endpush
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
                    {{-- <p class="fz-16 gray-666 mt-50">Anggaran dan Keuangan</p> --}}
                </div>
            </div>
            <div class="row mt-70">
                <div class="col-md-12">
                    <div class="causes">
                        @foreach ($news as $key => $news)
                            <div class="item">
                                <div class="causes-img text-center">
                                    <img src="{{ Storage::url($news->image) }}"alt="{{ $news->title }}"
                                        class="img-responsive">
                                </div>
                                <div class="cause-content text-center">
                                    <h5 class="martel text-semi-bold d-black mt-10">{!! Illuminate\Support\Str::limit($news->title, 150) !!}</h5>
                                    <p class="lh-22 mt-10">{!! Illuminate\Support\Str::limit($news->description, 150) !!}...</p>
                                    <a class="fz-14 mt-20 btn-green-br"
                                        href="berita/read/{{ $news->id }}/{{ $news->seo }}">Selengkapnya...</a>
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
    <section class="recent-causes mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="text-uppercase black h-sep">Berita <span class="text-ultra-bold"></span> </h3>
                    <p class="fz-16 gray-666 mt-50">Berita terbaru dari ppid kominfo</p>
                </div>
            </div>
            <div class="row mt-20">
                @foreach ($news5 as $key => $news5)
                    <div class="col-md-4 mt-50 cause-main">
                        <div class="item" style="height: 400px !important;">
                            <div class="causes-img text-center">
                                <img src="{{ Storage::url($news5->image) }}"alt="{{ $news5->title }}"
                                    class="img-responsive"
                                    style="width:300px!important; height: 150px!important; margin: 0 auto;">
                            </div>
                            <div class="cause-content text-center" style="padding: 2px !important;">
                                <p class="martel text-semi-bold d-black mt-5">{!! Illuminate\Support\Str::limit($news5->title, 40) !!}</p>
                                <div class="lh-22 mt-10">{!! Illuminate\Support\Str::limit($news5->description, 80) !!}...</div>
                                <a class="fz-14 mt-20 btn-green-br"
                                    href="berita/read/{{ $news5->id }}/{{ $news5->seo }}">Selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- agenda --}}
    <section class="mt-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="count-down">
                        <div class="count-header clearfix">
                            <div class="pull-left">
                                <h4 class="green-6f text-uppercase mb-15 text-semi-bold">Agenda Terbaru</h4>
                                @if ($agenda)
                                    <span class="karla gray-777 fz-14"><i class="fa fa-clock-o"></i>
                                        {{ $agenda->time }} <span class="three-pm">{{ $agenda->hour }}</span></span>
                                @endif
                            </div>
                            <img class="pull-right mt-10" src="{{ asset('frontend/img/calendar.png') }}" alt="">
                        </div>

                        <div id="clock"></div>
                        <div class="btns mt-50">
                            <a class="text-uppercase martel fz-14 btn-prime tri-b" href="/agenda">Lihat semua agenda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Regulation & Download --}}
    <section class="gray-f9f9-bg">
        <div class="container">
            <div class="row mb-100 ">
                <div class="col-md-6 col-sm-4 mt-150">
                    <div class="card" style="border: 2px solid #333333; padding:20px;">
                        <div class="contact-info clearfix">
                            <div class="pull-left">
                                <h3 class="black text-bold mb-30">Regulasi</h3>
                                @foreach ($regulation as $key => $reg)
                                    <a href="/regulation/{{ $reg->seo }}" class="text-muted">
                                        <h4 class="mt-15">{{ $key + 1 }}. {{ $reg->title }} </h4>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 mt-150">
                    <div class="card" style="border: 2px solid #333333; padding:20px;">
                        <div class="contact-info clearfix">
                            <div class="pull-left">
                                <h3 class="black text-bold mb-30">Downlad</h3>
                                @foreach ($download as $key => $dw)
                                    <a href="{{ Storage::url($dw->file) }}" download="{{ $dw->title }}"
                                        class="text-muted" target="_blank">
                                        <h4 class="mt-15">{{ $key + 1 }}. {{ $dw->title }} </h4>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- foto --}}
    <section class="recent-causes mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="text-uppercase black h-sep">Gallery <span class="text-ultra-bold"></span> </h3>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-6">
                    <div class="row">
                        @foreach ($imggallery as $img)
                            <a href="/gallery">
                                <div class="col-md-6 mt-15 cause-main">
                                    <div class="item">
                                        <div class="causes-img text-center">
                                            <img src="{{ Storage::url($img->image) }}"alt="foto" class="img-responsive"
                                                style="min-width:250px!important; height: 250px!important; margin: 0 auto; object-fit:cover;">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 mt-15">
                            @if ($video)
                                <iframe width="100%" height="100%"
                                    src="//www.youtube.com/embed/{{ $video->link }}?showinfo=0&amp;iv_load_policy=3&amp;controls=0"
                                    frameborder="0" allowfullscreen=""></iframe>
                            @else
                                <iframe width="100%" height="100%"
                                    src="//www.youtube.com/embed/?showinfo=0&amp;iv_load_policy=3&amp;controls=0"
                                    frameborder="0" allowfullscreen=""></iframe>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- infografis --}}
    <section class="projects gray-f9f9-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class=" black h-sep">Info <span class="text-ultra-bold">Grafis</span> </h3>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="Container" class="mt-100">
                <div class="row">
                    @foreach ($infografis as $ig)
                        <div class="col-md-15 no-padding-left mix edu">
                            <div class="project-img position-r">
                                <img class="img-responsive" src="{{ Storage::url($ig->image) }}" alt="infografis">
                                <div class="project-hover">
                                    <div class="project-hover-content">
                                        <div class="progress-status mt-25">
                                            <div class="barWrapper">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- testimoni --}}
    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-100">
                    <h3 class=" black h-sep">Testimoni<span class="text-ultra-bold"> </span> </h3>
                </div>
            </div>
            <div class="row mt-100">
                <div class="col-md-12">
                    <div class="test-sldier">
                        @foreach ($reviews as $review)
                            <div class="item">
                                <div class="test-img display-ib position-r pull-left">
                                    <img class="img-responsive display-ib" src="{{ Storage::url($review->image) }}"
                                        alt="{{ $review->name }}" style="min-height:250px !important;">
                                </div>
                                <div class="display-ib pull-left test-text">
                                    <img src="{{ asset('frontend/img/quote-open.png') }}" alt="">
                                    <h4 class="fz-17 d-black text-bold mt-30">{{ $review->name }}</h4>
                                    <p class="mt-25">{{ $review->review }} </p>
                                    <img class="pull-right mt-30" src="{{ asset('frontend/img/quote-close.png') }}"
                                        alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- banner --}}
    <section class="testimonials banner gray-f9f9-bg">
        <div class="container">
            <div class="row mt-100 mb-100">
                <div class="col-md-12">
                    <div class="test-sldier banner">
                        @foreach ($link as $key => $link)
                            <a href="{{ $link->url }}">
                                <div class="item">
                                    <div class="position-r pull-left">
                                        <img class="" src="{{ Storage::url($link->image) }}"
                                            alt="{{ $link->title }}" style="max-width: 250px !important;">
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

    <script>
        $.ajax({
            url: "/api/agenda",
            method: "GET",
            dataType: "json",
            success: function(res) {
                let data = res.data;

                moment.locale('id');
                let localDate = moment(data.time).format("DD-MMM-YYYY")
                localDate = localDate.split("-")
                let hour = data.hour;
                let localTime = hour.replace(" AM", "").replace(" PM", "").split(":")
                if (hour.includes("AM")) {
                    localTime[2] = "AM"
                } else {
                    localTime[2] = "PM"
                }
                $('#clock').countdown('', function(event) {
                    var $this = $(this).html(event.strftime('' +
                        `<div class="time-p mt-80 text-center"><span class="days poppins text-uppercase d-black">Tanggal</span> <span class="karla fz-60 green-6f">${localDate[0]}</span><span class="year karala fz-14 gray-777">${localDate[2]}</span></div>   ` +
                        `<div class="time-p mt-80 text-center"><span class="days poppins text-uppercase d-black">Bulan</span> <span class="karla fz-60 green-6f">${localDate[1]}</span><span class="year karala fz-14 gray-777">${localDate[2]}</span></div>   ` +
                        `<div class="time-p mt-80 text-center"><span class="hr poppins text-uppercase d-black">Jam</span> <span class="karla fz-60 green-6f">${localTime[0]}</span><span class="year karala fz-14 gray-777">${localDate[2]}</span></div>  ` +
                        `<div class="time-p mt-80 text-center"><span class="min poppins text-uppercase d-black">Menit</span> <span class="karla fz-60 green-6f">${localTime[1]}</span><span class="year karala fz-14 gray-777">${localDate[2]}</span></div>  ` +
                        `<div class="time-p mt-80 text-center"><span class="min poppins text-uppercase d-black">Waktu</span> <span class="karla fz-60 green-6f">${localTime[2]}</span><span class="year karala fz-14 gray-777">${localDate[2]}</span></div>  `
                    ));
                });

            }
        })
    </script>
@endpush
