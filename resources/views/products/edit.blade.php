@extends('layouts.app')

@section('title', 'Edit product')

@section('content')
    <h2>Edit product</h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <p>
            <label for="name">Name</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $product->name) }}"
                required
            >
            @error('name')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea
                id="description"
                name="description"
                rows="4"
            >{{ old('description', $product->description) }}</textarea>
            @error('description')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="type">Type</label><br>
            <input
                type="text"
                id="type"
                name="type"
                value="{{ old('type', $product->type) }}"
                required
            >
            @error('type')
                <br><span>{{ $message }}</span>
            @enderror
        </p>
		
		<p>
			<label for="solutions">Solutions</label><br>

			<select
				id="solutions"
				name="solutions[]"
				multiple
				size="5"
			>
				@foreach ($solutions as $solution)
					<option
						value="{{ $solution->id }}"
						@selected(in_array(
							$solution->id,
							old('solutions', $product->solutions->pluck('id')->all())
						))
					>
						{{ $solution->name }}
					</option>
				@endforeach
			</select>

			@error('solutions')
				<br><span>{{ $message }}</span>
			@enderror

			@error('solutions.*')
				<br><span>{{ $message }}</span>
			@enderror
		</p>
		
		<p>
			<label for="tags">Tags</label><br>

			<select
				id="tags"
				name="tags[]"
				multiple
				size="5"
			>
				@foreach ($tags as $tag)
					<option
						value="{{ $tag->id }}"
						@selected(in_array(
							$tag->id,
							old('tags', $product->tags->pluck('id')->all())
						))
					>
						{{ $tag->name }}
					</option>
				@endforeach
			</select>

			@error('tags')
				<br><span>{{ $message }}</span>
			@enderror

			@error('tags.*')
				<br><span>{{ $message }}</span>
			@enderror
		</p>

        <button type="submit">Update</button>
        <a href="{{ route('products.index') }}">Cancel</a>
    </form>
@endsection