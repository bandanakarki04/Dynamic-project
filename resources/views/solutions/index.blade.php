@extends('layouts.app')

@section('title', 'Solutions')

@section('content')
    <h2>Solutions</h2>

    @if (session('status'))
        <p role="status">{{ session('status') }}</p>
    @endif

    <p><a href="{{ route('solutions.create') }}">Add solution</a></p>

    @if ($solutions->isEmpty())
        <p>No solutions yet. Add the first one.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Related Products</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($solutions as $solution)
                    <tr>
                        <td>{{ $solution->name }}</td>
                        <td>{{ $solution->category ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($solution->description, 60) }}</td>
                        <td>
                            @forelse ($solution->products as $product)
                                <div>{{ $product->name }}</div>
                            @empty
                                <span>No products linked yet.</span>
                            @endforelse
                        </td>
                        <td>
                            <a href="{{ route('solutions.show', $solution) }}">View</a>
                            <a href="{{ route('solutions.edit', $solution) }}">Edit</a>

                            <form
                                action="{{ route('solutions.destroy', $solution) }}"
                                method="POST"
                                style="display:inline"
                                onsubmit="return confirm('Delete this solution?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $solutions->links() }}
    @endif
@endsection