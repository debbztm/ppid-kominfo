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
                    <th>No</th>
                    <th class="text-center">Nama File</th>
                    <th class="text-center">Download</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($regulation->maRegulationFiles as $key => $regfile)
                    <tr>
                        <td width="5%">{{ $key + 1 }}</td>
                        <td width="75%">{{ $regfile->title }}</td>
                        <td width="20%" class="text-center"><a class="badge badge-primary" href="{{ Storage::url($regfile->file) }}" download="{{ $regfile->title }}" target="_blank">Download</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">File Regulasi Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
