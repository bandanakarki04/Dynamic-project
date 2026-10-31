@extends('layouts.app')

@section('title', 'Product details')

@section('content')
    <h2>Product details</h2>

    <h3>{{ $product->name }}</h3>

    <p>
        <strong>Description:</strong>
        {{ $product->description }}
    </p>

    <p>
        <strong>Type:</strong>
        {{ $product->type }}
    </p>

    <h3>Solutions</h3>

    <ul>
        @forelse ($product->solutions as $solution)
            <li>{{ $solution->name }}</li>
        @empty
            <li>No solutions assigned.</li>
        @endforelse
    </ul>

    <h3>Tags</h3>

    <ul>
        @forelse ($product->tags as $tag)
            <li>{{ $tag->name }}</li>
        @empty
            <li>No tags assigned.</li>
        @endforelse
    </ul>

    <p>
        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        <a href="{{ route('products.index') }}">Back to products</a>
    </p>
@endsection