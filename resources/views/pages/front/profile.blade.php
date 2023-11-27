@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="page-title text-center"
        style="background-color: #fab20b !important; min-height:200px !important; max-height:200px">
        <h2 class="text-extra-bold white text-uppercase" style="line-height: 200px !important;">{{ $title }}</h2>
    </div>

    <section class="mt-100 mb-100 about-us-main mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12 cancer">
                    @if ($option)
                        <p class="fz-15 gray-777 lh-28 mt-15">
                            {!! $option->value !!}
                        </p>
                        @if ($option->file)
                            <iframe src="{{ Storage::url($option->file) }}" width="100%" height="680"
                                frameborder="0"></iframe>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
