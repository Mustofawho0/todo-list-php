@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    @forelse ($example as $item)
        <p>Name : {{ $item->name }}</p>
        <p>Price : Rp. {{ $item->price }}</p>
        <p>Quantity {{ $item->qty }}</p>
        {{-- <p>{{ $product->desc }}</p> --}}

    @empty
        <p>No Product List</p>
    @endforelse


@endsection
