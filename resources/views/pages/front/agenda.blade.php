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
        <div class="table-responsive">

            <table class="table styled-table dataTable" id="agendaTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Agenda</th>
                        <th class="text-center">Tempat</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jam</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($agenda as $key => $ag)
                    <tr>
                        <td width="5%">{{ $key + 1 }}</td>
                        <td width="40%">{!! $ag->title !!}</td>
                        <td width="25%">{{ $ag->place }}</td>
                        <td width="15%">{!! (new \App\Helpers\Helper())->tgl_indo($ag->time) !!}</td>
                        <td width="10%">{{ $ag->hour }}</td>
                        </td>
                    </tr>
                @endforeach --}}
                </tbody>
            </table>
        </div>

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
            const url = "/api/agenda/datatable";
            dTable = $("#agendaTable").DataTable({
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
                    width: "50%",
                    data: "title"
                }, {
                    width: "20%",
                    data: "place"
                }, {
                    width: "10%",
                    data: "time"
                }, {
                    width: "10%",
                    data: "hour"
                }],
                pageLength: 25,
            });
        }
    </script>
@endpush
