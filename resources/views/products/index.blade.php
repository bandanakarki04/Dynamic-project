@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <h2>Products</h2>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <p><a href="{{ route('products.create') }}">Add product</a></p>
	
	<p>
		<label for="solution-filter">Filter by solution:</label>

		<select id="solution-filter">
			<option value="">All solutions</option>

			@foreach ($solutions as $solution)
				<option value="{{ $solution->id }}" @selected(request()->query('solution') == $solution->id)>
					{{ $solution->name }}
				</option>
			@endforeach
		</select>
	</p>
	<p>
		<label for="tag-filter">Filter by tag:</label>

		<select id="tag-filter">
			<option value="">All tags</option>

			@foreach ($tags as $tag)
				<option value="{{ $tag->id }}" @selected(request()->query('tag') == $tag->id)>
					{{ $tag->name }}
				</option>
			@endforeach
		</select>
	</p>
	<div id="product-list">
		@include('products._list')
	</div>
@endsection

@vite('resources/js/product-filter.js')