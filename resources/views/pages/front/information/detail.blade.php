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
    <div class="container">
        <div class="row mt-100 mb-150">
            <div class="col-md-12 mt-50">
                @if ($news)
                    <div class="blog-post-details">
                        <div class="blog-post-img">
                            <img class="img-responsive" src="{{ Storage::url($news->image) }}" alt="">
                            <div class="blog-post-date"><img src="{{ asset('frontend/img/blog-c.png') }}" alt=""><span
                                    class="white martel fz-13 text-uppercase">{!! (new \App\Helpers\Helper())->tgl_indo($news->created_at) !!}</span></div>
                        </div>
                        <h4 class="black-23 mt-40">{{ $news->title }}</h4>
                        <h6 class="ubuntu fz-13 gray-777 mt-20 mb-20">Pengunjung {{ $news->views }}</h6>
                        {!! $news->description !!}
                    </div>
                    <div class="mt-150 mb-150">
                        <table class="styled-table dataTable" id="publicInformationNewDataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="blog-single-share clearfix mt-50">
                        <div class="pull-right text-center">
                            <span class="martel text-bold fz-13 gray-777 text-uppercase">Share Informasi</span>
                            <a href="https://www.facebook.com/sharer.php?u={{ Request::url() }}" target="_blank"
                                rel="noreferrer" role="link">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/share?url={{ Request::url() }}" target="_blank" rel="noreferrer"
                                role="link">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ Request::url() }}" target="_blank"
                                rel="noreferrer" role="link">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ Request::url() }}"
                                target="_blank" rel="noreferrer" role="link">
                                <i class="fa fa-linkedin va-2"></i>
                            </a>
                            <a href="mailto:?body={{ Request::url() }}" target="_blank" rel="noreferrer" role="link">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/datatables/datatables.min.js') }}"></script>
    <script>
        $(function() {
            dataTable();
        })

        function dataTable() {
            let currentUrl = window.location.href;
            let parts = currentUrl.split('/');
            let seo = parts[parts.length - 1];
            const url = "/api/public-information-file/datatable/" + seo;
            dTable = $("#publicInformationNewDataTable").DataTable({
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
                    width: "25%",
                    data: "title"
                }, {
                    width: "35%",
                    data: "description"
                }, {
                    width: "20%",
                    class: "text-center",
                    data: "download"
                }],
                pageLength: 25,
            });
        }
    </script>
@endpush
