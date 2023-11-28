@extends('layouts.app')
@section('title', $title)
@push('styles')
@endpush
@section('content')
    <div class="page-title text-center"
        style="background-color: #fab20b !important; min-height:200px !important; max-height:200px">
        <h2 class="text-extra-bold white text-uppercase" style="line-height: 200px !important;">{{ $titlePage }}</h2>
    </div>

    <section class="mt-100 mb-100 about-us-main mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12 cancer">
                    @if ($polling)
                        @php
                            $total = $polling->vote1 + $polling->vote2 + $polling->vote3 + $polling->vote4;
                            $satu = ($polling->vote1 / $total) * 100;
                            $dua = ($polling->vote2 / $total) * 100;
                            $tiga = ($polling->vote3 / $total) * 100;
                            $empat = ($polling->vote4 / $total) * 100;
                        @endphp
                        <strong>{{ $polling->answer1 }}</strong><span class="pull-right">{{ $polling->vote1 }} Vote</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                style="width:{{ round(($polling->vote1 / $total) * 100) }}%;"
                                aria-valuenow="{{ round(($polling->vote1 / $total) * 100) }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>

                        <strong>{{ $polling->answer2 }}</strong><span class="pull-right">{{ $polling->vote2 }} Vote</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                style="width:{{ round(($polling->vote2 / $total) * 100) }}%;"
                                aria-valuenow="{{ round(($polling->vote2 / $total) * 100) }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>

                        <strong>{{ $polling->answer3 }}</strong><span class="pull-right">{{ $polling->vote3 }} Vote</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                style="width:{{ round(($polling->vote3 / $total) * 100) }}%;"
                                aria-valuenow="{{ round(($polling->vote3 / $total) * 100) }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>

                        <strong>{{ $polling->answer4 }}</strong><span class="pull-right">{{ $polling->vote4 }} Vote</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                style="width:{{ round(($polling->vote4 / $total) * 100) }}%;"
                                aria-valuenow="{{ round(($polling->vote4 / $total) * 100) }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
