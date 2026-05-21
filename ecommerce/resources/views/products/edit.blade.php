@extends('layouts.app')

@section('content')

<h1>Edit Product</h1>

<form action="{{ route('products.update',$product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text"
           name="name"
           value="{{ $product->name }}">

    <input type="number"
           name="price"
           value="{{ $product->price }}">

    <input type="number"
           name="stock"
           value="{{ $product->stock }}">

    <textarea name="description">{{ $product->description }}</textarea>

    <button class="btn btn-add">
        Update
    </button>
</form>

@endsection