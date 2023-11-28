@extends('layouts.app')
@section('title', $title)
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/featherlight.css') }}">
@endpush
@section('content')
    <section class="mt-150 mb-150 gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class=" black h-sep">Gallery Photo</span> </h3>
                </div>
            </div>
            <div class="row mt-50">
                @foreach ($galleries as $gallery)
                    <div class="mb-50 text-center">
                        <h5 class="">{{ $gallery->title }}</h5>
                    </div>
                    @foreach ($gallery->maImageGalleries as $img)
                        <div class="col-md-3 col-sm-6 mt-50 text-center">
                            <div class="gallery-item">
                                <div class="gallery-img">
                                    <img class="img-responsive" src="{{ Storage::url($img->image) }}" alt="">
                                    <div class="gallery-overlay"></div>
                                    <div class="gallery-overlay-content text-center" data-featherlight="{{ Storage::url($img->image) }}">
                                        {{-- <img data-featherlight="{{ Storage::url($img->image) }}"
                                            src="{{ asset('frontend/img/locked.png') }}" alt=""> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 text-center mt-100 view-more">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/js/featherlight.js') }}"></script>
@endpush
