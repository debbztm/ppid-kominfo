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
    <div class="page-title text-center"
        style="background-color: #fab20b !important; min-height:200px; color: white !important;">
        <div class="container">
            <div class="row">
                <div class="col-12" style="color: white !important;">
                    {!! $information->description !!}
                </div>
            </div>
        </div>
    </div>

    <section class="container mt-150 mb-150">
        <table class="styled-table dataTable" id="publicInformationNewDataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Detail</th>
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
            let currentUrl = window.location.href;
            let parts = currentUrl.split('/');
            let seo = parts[parts.length - 1];
            const url = "/api/public-information-news/datatable/" + seo;
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
                    data: "detail"
                }],
                pageLength: 25,
            });
        }
    </script>
@endpush
