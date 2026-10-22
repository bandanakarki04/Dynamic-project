@extends('layouts.app')

@section('content')
    <h1>Tags</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('tags.create') }}">Add tag</a></p>

    @if ($tags->isEmpty())
        <p>No tags yet. Add the first one.</p>
    @else
        <table>
            <thead>
                <tr><th>Name</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a href="{{ route('tags.show', $tag) }}">View</a>
                            <a href="{{ route('tags.edit', $tag) }}">Edit</a>
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline"
                                  onsubmit="return confirm('Delete this tag?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tags->links() }}
    @endif
@endsection
