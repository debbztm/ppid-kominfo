{{-- @extends('layouts.app')
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
                                    <div class="gallery-overlay-content text-center"
                                        data-featherlight="{{ Storage::url($img->image) }}">

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
@endpush --}}


@extends('layouts.app')
@section('title', $title)
@push('styles')
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #fab20b;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #fab20b;
        }

        /* Mengatur ukuran input pencarian dan posisinya */
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            padding: 0;
            margin: 0;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: 200px;
            /* Sesuaikan ukuran sesuai preferensi Anda */
            display: inline-block;
            margin: 0;
            padding: 0;
            padding-left: 0.5em;
            margin-left: 10px;
        }

        /* Mengatur tampilan elemen "Show Entries" */
        .dataTables_wrapper .dataTables_length {
            float: left;
            margin: 0;
        }

        /* Mengatur tampilan tombol "Previous" dan "Next" */
        .dataTables_wrapper .dataTables_paginate {
            float: right;
            margin: 0;
        }
    </style>
@endpush
@section('content')
    <section class="container mt-150 mb-150">
        <table class="styled-table dataTable" id="regulationTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </section>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/datatables/datatables.min.js') }}"></script>
    <script>
        $(function() {
            dataTable();
        })

        function dataTable() {
            const url = "/api/gallery/photo/datatable";
            dTable = $("#regulationTable").DataTable({
                searching: true,
                orderng: false,
                lengthChange: true,
                responsive: true,
                processing: true,
                serverSide: true,
                searchDelay: 1000,
                paging: true,
                lengthChange: false,
                // lengthMenu: [5, 10, 25, 50, 100],
                ajax: url,
                columns: [{
                    width: "5%",
                    data: "no"
                }, {
                    width: "40%",
                    data: "title"
                }, {
                    width: "10%",
                    class: "text-center",
                    data: "detail"
                }],
                pageLength: 25,
            });
        }
    </script>
@endpush
