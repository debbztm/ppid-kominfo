@extends('layouts.dashboard')
@section('title', $title)
@php
    $role = json_decode(Cookie::get('user'))->role->name;
@endphp
@section('content')
    <div class="row">
        @if ($role == 'ADMIN')
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-placeholder text-info"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Balai</p>
                                    <h4 class="card-title">{{ $hall }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-picture text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Slide</p>
                                    <h4 class="card-title">{{ $slide }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-photo-camera text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Photo</p>
                                    <h4 class="card-title">{{ $slide }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-play-button-1 text-info"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Video</p>
                                    <h4 class="card-title">{{ $slide }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-agenda-1 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Regulasi</p>
                                    <h4 class="card-title">{{ $regulation }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-chat-4 text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Pesan</p>
                                    <h4 class="card-title">{{ $message }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-graph text-info"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Review</p>
                                    <h4 class="card-title">{{ $review }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-users text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Pengguna</p>
                                    <h4 class="card-title">{{ $users }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-interface-6 text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Berita</p>
                                <h4 class="card-title">{{ $news }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-calendar text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Agenda</p>
                                <h4 class="card-title">{{ $agenda }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-down-arrow-3 text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Download</p>
                                <h4 class="card-title">{{ $download }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($role == 'ADMIN')
        <div class="row">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Hasil Jejak Pendapat</div>
                        <div class="" style="margin-top: 30px">

                            @if ($polling)
                                @php
                                    $total = $polling->vote1 + $polling->vote2 + $polling->vote3 + $polling->vote4;
                                    $satu = ($polling->vote1 / $total) * 100;
                                    $dua = ($polling->vote2 / $total) * 100;
                                    $tiga = ($polling->vote3 / $total) * 100;
                                    $empat = ($polling->vote4 / $total) * 100;
                                @endphp
                                <div class="mt-3">
                                    <strong>{{ $polling->answer1 }}</strong><span
                                        class="pull-right">{{ $polling->vote1 }}
                                        Vote</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                            style="width:{{ round(($polling->vote1 / $total) * 100) }}%;"
                                            aria-valuenow="{{ round(($polling->vote1 / $total) * 100) }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <strong>{{ $polling->answer2 }}</strong><span
                                        class="pull-right">{{ $polling->vote2 }}
                                        Vote</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                            style="width:{{ round(($polling->vote2 / $total) * 100) }}%;"
                                            aria-valuenow="{{ round(($polling->vote2 / $total) * 100) }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <strong>{{ $polling->answer3 }}</strong><span
                                        class="pull-right">{{ $polling->vote3 }}
                                        Vote</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                            style="width:{{ round(($polling->vote3 / $total) * 100) }}%;"
                                            aria-valuenow="{{ round(($polling->vote3 / $total) * 100) }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <strong>{{ $polling->answer4 }}</strong><span
                                        class="pull-right">{{ $polling->vote4 }}
                                        Vote</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                            style="width:{{ round(($polling->vote4 / $total) * 100) }}%;"
                                            aria-valuenow="{{ round(($polling->vote4 / $total) * 100) }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
