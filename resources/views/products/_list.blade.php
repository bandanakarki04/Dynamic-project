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
            <tr class="product-row">
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->type }}</td>
                <td>
                    <a href="{{ route('products.show', ['product' => $product->id, 'tag' => request()->query('tag'), 'solution' => request()->query('solution')]) }}">
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
                <td colspan="4">No products found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}