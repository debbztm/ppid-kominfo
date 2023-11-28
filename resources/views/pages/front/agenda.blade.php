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
    </style>
@endpush
@section('content')
    @php
        function tgl_indo($tgl)
        {
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d', strtotime($tgl));
            $pecah = explode('-', $date);
            $tanggal = $pecah[2];
            $bulan = bulan($pecah[1]);
            $tahun = $pecah[0];
            return $tanggal . ' ' . $bulan . ' ' . $tahun;
        }
        function bulan($bln)
        {
            switch ($bln) {
                case 1:
                    return 'Januari';
                    break;
                case 2:
                    return 'Februari';
                    break;
                case 3:
                    return 'Maret';
                    break;
                case 4:
                    return 'April';
                    break;
                case 5:
                    return 'Mei';
                    break;
                case 6:
                    return 'Juni';
                    break;
                case 7:
                    return 'Juli';
                    break;
                case 8:
                    return 'Agustus';
                    break;
                case 9:
                    return 'September';
                    break;
                case 10:
                    return 'Oktober';
                    break;
                case 11:
                    return 'Nopember';
                    break;
                case 12:
                    return 'Desember';
                    break;
            }
        }
    @endphp
    <section class="container mt-150 mb-150">
        <table class="styled-table">
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
                @foreach ($agenda as $key => $ag)
                    <tr>
                        <td width="5%">{{ $key + 1 }}</td>
                        <td width="40%">{!! $ag->title !!}</td>
                        <td width="25%">{{ $ag->place }}</td>
                        <td width="15%">{{ tgl_indo($ag->date) }}</td>
                        <td width="10%">{{ $ag->hour }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endsection
