@extends('layouts.admin')

@section('title','Promo')

@section('content')
<h2 class="mb-4">Daftar Promo</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ url('/admin/promos/create') }}" class="btn btn-primary mb-3">+ Tambah Promo</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Judul</th>
            <th>Diskon (%)</th>
            <th>Berlaku Hingga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($promos as $promo)
        <tr>
            <td>{{ $promo->code }}</td>
            <td>{{ $promo->title }}</td>
            <td>{{ $promo->discount }}</td>
            <td>{{ $promo->valid_until->format('d-m-Y') }}</td>
            <td>{{ $promo->active ? 'Aktif' : 'Nonaktif' }}</td>
            <td>
                <a href="{{ url('/admin/promos/'.$promo->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ url('/admin/promos/'.$promo->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus promo ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
