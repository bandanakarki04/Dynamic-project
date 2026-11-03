@extends('layouts.app')

@section('content')
    <h1>KPIs</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <p><a href="{{ route('kpis.create') }}">Add KPI</a></p>

    @if ($kpis->isEmpty())
        <p>No KPIs yet. Add the first one.</p>
    @else
        <table>
            <thead>
                <tr><th>Name</th><th>Description</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach ($kpis as $kpi)
                    <tr>
                        <td>{{ $kpi->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($kpi->description, 60) }}</td>
                        <td>
                            <a href="{{ route('kpis.show', $kpi) }}">View</a>
                            <a href="{{ route('kpis.edit', $kpi) }}">Edit</a>
                            <form action="{{ route('kpis.destroy', $kpi) }}" method="POST" style="display:inline"
                                  onsubmit="return confirm('Delete this KPI?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $kpis->links() }}
    @endif
@endsection
