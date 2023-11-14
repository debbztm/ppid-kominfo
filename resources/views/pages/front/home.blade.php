@extends('layouts.app')
@section('title', $title);
@section('content')
    <div class="banner-area">
        <div class="banner-slide owl-theme owl-carousel">
            @foreach ($slide as $key => $slide)
                <div class="banner-item">
                    <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->title }}">
                </div>
            @endforeach
        </div>
    </div>



    <section class="service-area-two pt-30 pb-30">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">INFORMASI PUBLIK</span>
                <h2>Anggaran dan Keuangan</h2>
            </div>
            <div class="anggarankeuangan owl-theme owl-carousel">
                @foreach ($hmanggaran as $key => $hmanggaran)
                    <div class="service-item">
                        <i class="flaticon-mechanical-arm"></i>
                        <h3><a href="http://{{ $hmanggaran->url }}" target="_blank">{{ $hmanggaran->title }}</a></h3>
                        <p>{{ $hmanggaran->description }}</p>
                        <a class="service-link" href="http://{{ $hmanggaran->url }}" target="_blank">Selengkapnya...</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="team-area pt-40 pb-40">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">PEJABAT</span>
                <h2>PPID PEMBANTU DINAS ESDM JAWA TENGAH</h2>
            </div>
            <div class="row">
                @foreach ($officialppid as $key => $pj)
                    <div class="col-sm-6 col-lg-3">
                        <div class="team-item">
                            <img src="{{ Storage::url($pj->image) }}" alt="{{ $pj->title1 }}">
                            <h5>{{ $pj->title1 }}</h5>
                            <span>{{ $pj->title2 }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="counter-area pt-40 pb-40">
        <div class="container">
            <div class="row align-iems-center">
                <div class="col-lg-3">
                    <div class="counter-text">
                        <h2>Permohonan Informasi</h2>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-sm-2-5 col-lg-2-5">
                            <div class="counter-item">
                                <h3>
                                    {{-- <span class="odometer"
                                    data-count="<?= $meta->permohonan ?>"><?= $meta->permohonan ?></span> --}}
                                </h3>
                                <p>PERMOHONAN</p>
                            </div>
                        </div>
                        <div class="col-sm-2-5 col-lg-2-5">
                            <div class="counter-item">
                                <h3>
                                    {{-- <span class="odometer"
                                    data-count="<?= $meta->dikabulkan ?>"><?= $meta->dikabulkan ?></span> --}}
                                </h3>
                                <p>DIKABULKAN</p>
                            </div>
                        </div>
                        <div class="col-sm-2-5 col-lg-2-5">
                            <div class="counter-item">
                                <h3>
                                    {{-- <span class="odometer"
                                    data-count="<?= $meta->keberatan ?>"><?= $meta->keberatan ?></span> --}}
                                </h3>
                                <p>KEBERATAN</p>
                            </div>
                        </div>
                        <div class="col-sm-2-5 col-lg-2-5">
                            <div class="counter-item">
                                <h3>
                                    {{-- <span class="odometer" data-count="<?= $meta->ditolak ?>"><?= $meta->ditolak ?></span> --}}
                                </h3>
                                <p>DITOLAK</p>
                            </div>
                        </div>
                        <div class="col-sm-2-5 col-lg-2-5">
                            <div class="counter-item">
                                <h3>
                                    {{-- <span class="odometer" data-count="<?= $meta->ikm ?>"><?= $meta->ikm ?></span> --}}
                                </h3>
                                <p>IKM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-area pt-40 pb-40">
        <div class="container">
            <div class="section-title">
                <h2>Berita</h2>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    {{-- <?php foreach ($berita1 as $key => $berita1): ?>
                <div class="blog-item shadow">
                    <a href="<?php echo base_url('berita/read/' . $berita1->id_post . '/' . $berita1->seo_post); ?>"><img
                            src="<?= base_url('assets/upload/image/' . $berita1->img_post) ?>" alt="Blog"></a>
                    <span><?= tgl_indo($berita1->date) ?></span>
                    <div class="blog-inner">
                        <h3><a href="<?php echo base_url('berita/read/' . $berita1->id_post . '/' . $berita1->seo_post); ?>"><?= $berita1->title_post ?></a></h3>
                        <a class="blog-link" href="<?php echo base_url('berita/read/' . $berita1->id_post . '/' . $berita1->seo_post); ?>">Selengkapnya..<i class='bx bx-plus'></i></a>
                    </div>
                </div>
                <?php endforeach ?> --}}
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="row">
                        {{-- <?php foreach ($berita2 as $key => $berita2): ?>
                    <div class="col-sm-6 col-lg-12">
                        <div class="blog-item active shadow">
                            <a href="<?php echo base_url('berita/read/' . $berita2->id_post . '/' . $berita2->seo_post); ?>"><img
                                    src="<?= base_url('assets/upload/image/' . $berita2->img_post) ?>"
                                    alt="Blog"></a>
                            <span><?= tgl_indo($berita2->date) ?></span>
                            <div class="blog-inner">
                                <h3><a href="<?php echo base_url('berita/read/' . $berita2->id_post . '/' . $berita2->seo_post); ?>"><?= $berita2->title_post ?></a></h3>
                                <a class="blog-link" href="<?php echo base_url('berita/read/' . $berita2->id_post . '/' . $berita2->seo_post); ?>">Selengkapnya..<i
                                        class='bx bx-plus'></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="testimonial-area pt-30 pb-30">
        <div class="testimonial-shape">
            <img src="{{ asset('/frontend/images/testimonial-bg.png') }}" alt="ESDM Jateng">
        </div>
        <div class="container">
            <div class="section-title">
                <h2>Info Grafis</h2>
            </div>
            <div class="infografis owl-theme owl-carousel">
                @foreach ($infografis as $key => $infografis)
                    <figure class="videoku c4-border-cc-2 c4-gradient-bottom-left c4-image-zoom-in style="--primary-color:
                        #000046; --secondary-color: #1CB5E0; --text-color: #fdeff9; --border-color: #fdeff9;">
                        <img src="{{ Storage::url($infografis->image) }}" />
                        <figcaption class="c4-layout-center-center">
                            <div class="icon-wrapper c4-fade c4-delay-300">
                                <a class="view-detail" data-fancybox="infografis"
                                    data-src="{{ Storage::url($infografis->image) }}"> LIHAT
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <div class="logo-area logo-area-two pb-30">
        <div class="container">
            <div id="bannerhome" class="linkbanner owl-theme owl-carousel">
                @foreach ($link as $key => $link)
                    <a href="http://{{ $link->url }}"><img src="{{ Storage::url($link->image) }}"
                            alt="{{ $link->title }}" /></a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
