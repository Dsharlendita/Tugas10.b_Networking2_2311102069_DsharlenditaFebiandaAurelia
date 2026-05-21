@extends('layouts.app')

@section('content')

<h1>Product Ecommerce</h1>

<a href="{{ route('products.create') }}" class="btn btn-add">
    + Tambah Product
</a>

<br><br>

<table>
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>Rp {{ number_format($product->price) }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            <a href="{{ route('products.edit',$product->id) }}"
               class="btn btn-edit">
               Edit
            </a>

            <form action="{{ route('products.destroy',$product->id) }}"
                  method="POST"
                  style="display:inline-block">

                @csrf
                @method('DELETE')

                <button class="btn btn-delete">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection