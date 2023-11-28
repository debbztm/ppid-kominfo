@extends('layouts.app')
@section('title', $title)
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/featherlight.css') }}">
    <style>
        .video-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            /* Jarak antar thumbnail */
        }

        .video-gallery a {
            cursor: pointer;
        }

        .modal {
            display: none;
            /* Sembunyikan modal sampai diaktifkan */
            position: fixed;
            /* Tetap di layar */
            z-index: 1000;
            /* Pastikan di atas konten lain */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            /* Aktifkan scroll jika diperlukan */
            background-color: rgb(0, 0, 0);
            /* Warna latar */
            background-color: rgba(0, 0, 0, 0.9);
            /* Warna latar dengan transparansi */
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        #videoFrame {
            margin: 10% auto;
            display: block;
        }
    </style>
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
                <div class="video-gallery">
                    @foreach ($videos as $video)
                        <a href="javascript:void(0);" onclick="playVideo('https://www.youtube.com/embed/{{$video->link}}')">
                            <img src="https://i.ytimg.com/vi/{{ $video->link }}/hqdefault.jpg" alt="{{ $video->title }}">
                        </a>
                    @endforeach
                </div>
                <div id="videoModal" class="modal">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <iframe id="videoFrame" width="60%" height="50%" src="" frameborder="0"
                        allowfullscreen></iframe>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center mt-100 view-more">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/js/featherlight.js') }}"></script>
    <script>
        function playVideo(url) {
            console.log("sini : ", url)
            var modal = document.getElementById("videoModal");
            var frame = document.getElementById("videoFrame");
            modal.style.display = "block";
            frame.src = url;
        }

        function closeModal() {
            var modal = document.getElementById("videoModal");
            var frame = document.getElementById("videoFrame");
            modal.style.display = "none";
            frame.src = "";
        }
    </script>
@endpush
