
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
                        <td width="15%">{!! (new \App\Helpers\Helper)->tgl_indo($ag->time) !!}</td>
                        <td width="10%">{{ $ag->hour }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endsection
