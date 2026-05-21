@extends('layouts.app')

@section('content')

<h1>Tambah Product</h1>

@if ($errors->any())
    <div style="background:#ffdddd;padding:15px;border-radius:10px;margin-bottom:20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama Product" required>

    <input type="number" name="price" placeholder="Harga" required>

    <input type="number" name="stock" placeholder="Stock" required>

    <textarea name="description" placeholder="Deskripsi"></textarea>

    <button class="btn btn-add">
        Simpan
    </button>
</form>

@endsection