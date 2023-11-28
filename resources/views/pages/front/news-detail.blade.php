@extends('layouts.app')
@section('title', $title)
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row mt-100 mb-150">
            <div class="col-md-12 mt-50">
                @if ($news)
                    <div class="blog-post-details">
                        <div class="blog-post-img">
                            <img class="img-responsive" src="{{ Storage::url($news->image) }}" alt="">
                            <div class="blog-post-date"><img src="{{ asset('frontend/img/blog-c.png') }}" alt=""><span
                                    class="white martel fz-13 text-uppercase">{!! (new \App\Helpers\Helper())->tgl_indo($news->date) !!}</span></div>
                        </div>
                        <h4 class="black-23 mt-40">{{ $news->title }}</h4>
                        <h6 class="ubuntu fz-13 gray-777 mt-20 mb-20">Dibuat oleh {{ $news->username }}</h6>
                        {!! $news->description !!}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
