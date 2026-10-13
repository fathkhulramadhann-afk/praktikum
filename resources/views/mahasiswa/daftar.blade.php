@extends('layouts.app')
@section('title', 'Daftar Mahasiswa')
@section('content')
    <h1>Daftar Mahasiswa</h1>

@if ($adaIpkRendah)
    <x-alert tipe="bahaya">Ada mahasiswa dengan IPK di bawah 2,0.</x-alert>
@endif

    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 4px 8px; }
    </style>

    <table>
        <tr><th>No</th><th>Nama</th><th>NIM</th><th>IPK</th><th>Keterangan</th><th>Aksi</th></tr>
    @forelse ($mahasiswa as $m)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m['nama'] }}</td>
            <td>{{ $m['nim'] }}</td>
            <td>{{ number_format($m['ipk'], 2, ',', '.') }}</td>
            <td>
                @if ($m['ipk'] >= 3.5) Cum Laude
                @elseif ($m['ipk'] >= 3.0) Baik
                @else Perlu ditingkatkan
                @endif
            </td>
            <td><a href="{{ route('mahasiswa.detail', $m['nim']) }}">Detail</a></td>
        </tr>
    @empty
        <tr><td colspan="6">Belum ada data.</td></tr>
    @endforelse
    </table>
@endsection