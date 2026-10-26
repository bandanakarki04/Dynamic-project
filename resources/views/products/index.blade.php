@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <h2>Products</h2>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <p><a href="{{ route('products.create') }}">Add product</a></p>
	
	<p>
		<label for="tag-filter">Filter by tag:</label>

		<select id="tag-filter">
			<option value="">All tags</option>

			@foreach ($tags as $tag)
				<option value="{{ $tag->id }}">
					{{ $tag->name }}
				</option>
			@endforeach
		</select>
	</p>

    <table>
        <thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Type</th>
				<th>Actions</th>
			</tr>
		</thead>
        <tbody>
            @forelse ($products as $product)
			<tr
				class="product-row"
				data-tags="{{ $product->tags->pluck('id')->toJson() }}"
			>
					<td>{{ $product->name }}</td>
					<td>{{ $product->description }}</td>
					<td>{{ $product->type }}</td>
					<td>
						<a href="{{ route('products.show', $product->id) }}">
							Details
						</a>

						<a href="{{ route('products.edit', $product->id) }}">
							Edit
						</a>

						<form
							method="POST"
							action="{{ route('products.destroy', $product->id) }}"
							onsubmit="return confirm('Delete this product?');"
						>
							@csrf
							@method('DELETE')
							<button type="submit">Delete</button>
						</form>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="4">No products yet.</td>
				</tr>
			@endforelse
        </tbody>
    </table>

    {{ $products->links() }}
@endsection

@vite('resources/js/product-filter.js')