@extends('layouts.admin')

@section('title','Layanan')

@section('content')
<h2>Daftar Layanan</h2>
<a href="/admin/services/create" class="btn btn-success mb-3">+ Tambah Layanan</a>

@if(session('success')) 
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Layanan</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $index => $s)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $s->name }}</td>
            <td>Rp {{ number_format($s->price,0,",",".") }}</td>
            <td>{{ $s->unit }}</td>
            <td>    
                @if($s->image)
                    <img src="{{ asset('storage/'.$s->image) }}" alt="{{ $s->name }}" width="100">
                @else
                    Tidak ada foto
                @endif
            </td>
            <td>
                <a href="/admin/services/{{ $s->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form action="/admin/services/{{ $s->id }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
