@if ($errors->any())
    <div role="status">>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p>
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name" value="{{ old('name', $tag->name ?? '') }}" required>
</p>
<p>
    <label for="product_id">Product</label><br>

    <select name="product_id" id="product_id">
        <option value="">-- Select Product --</option>

        @foreach ($products as $product)
            <option value="{{ $product->id }}">
                {{ $product->name }}
            </option>
        @endforeach
    </select>
</p>

<button type="submit">Save</button>
<a href="{{ route('tags.index') }}">Cancel</a>
