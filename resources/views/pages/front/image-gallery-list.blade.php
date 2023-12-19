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
                    <p class="fz-16 gray-666 mt-50">{{ $gallery->title }}</p>
                </div>
            </div>
            <div class="row mt-50">
                @foreach ($images as $img)
                    <div class="col-md-4 col-sm-6 mt-50 text-center">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img class="img-responsive" src="{{ Storage::url($img->image) }}" alt="image gallery"
                                    style="width:450px!important; height: 350px!important; margin: 0 auto; object-fit:cover !important;">
                                <div class="gallery-overlay"></div>
                                <div class="gallery-overlay-content text-center"
                                    data-featherlight="{{ Storage::url($img->image) }}">
                                </div>
                            </div>
                            <h5 class="text-semi-bold mt-30">{!! (new \App\Helpers\Helper())->tgl_indo($img->created_at) !!}</h5>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 text-center mt-100 view-more">
                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/js/featherlight.js') }}"></script>
@endpush
