{{-- Ganti 'layouts.admin' sesuai dengan nama layout admin utama Anda --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Partner</h2>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tugas 4: Form Input Partner Baru --}}
    <div class="card mb-4">
        <div class="card-header">Tambah Partner Baru</div>
        <div class="card-body">
            <form action="{{ route('partners.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Partner</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Logo URL</label>
                    <input type="text" name="logo_url" class="form-control" placeholder="https://placehold.co/200x200" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Partner</button>
            </form>
        </div>
    </div>

    {{-- Tugas 3: Looping dan menampilkan data dummy --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $index => $partner)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $partner->name }}</td>
                <td><img src="{{ $partner->logo_url }}" width="50" alt="{{ $partner->name }}"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection