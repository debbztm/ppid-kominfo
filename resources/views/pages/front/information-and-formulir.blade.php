@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="page-title text-center"
        style="background-color: #fab20b !important; min-height:200px !important; max-height:200px">
        <h2 class="text-extra-bold white text-uppercase" style="line-height: 200px !important;">DAFTAR INFORMASI DAN FORMULIR
            PENGAJUAN</h2>
    </div>

    <section class="mt-100 mb-100 about-us-main mb-150">
        <div class="container">
            <div class="row">
                @foreach ($public_information as $information)
                    <div class="col-md-3 text-center">
                        <div class="btns mt-25">
                            <a class="text-uppercase martel fz-14 btn-prime tri-b"
                                href="{{ route('information', $information->seo) }}" style="width: 265px;">
                                {{ $information->title }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="btns mt-25">
                        <a class="text-uppercase martel fz-14 btn-prime tri-b"
                            href="{{ route('form-request') }}" style="width: 265px;">
                            Permohonan Informasi
                        </a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="btns mt-25">
                        <a class="text-uppercase martel fz-14 btn-prime tri-b"
                            href="{{ route('form-objection') }}" style="width: 265px;">
                            Formulir Keberatan
                        </a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="btns mt-25">
                        <a class="text-uppercase martel fz-14 btn-prime tri-b"
                            href="{{ route('form-complaint') }}" style="width: 265px;">
                            Pengaduan ASN
                        </a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="btns mt-25">
                        <a class="text-uppercase martel fz-14 btn-prime tri-b"
                            href="{{ route('form-satisfaction') }}" style="width: 265px;">
                            Index Kepuasan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
