@extends('layouts.app')

@section('title', 'Create Case')

@section('content')
<h2>Create Case</h2>

<form>

    <p>
        <label>Client Name</label><br>
        <input type="text" name="client_name">
    </p>

    <p>
        <label>Problem</label><br>
        <select name="problem_id">
            @foreach($problems as $problem)
                <option value="{{ $problem->id }}">
                    {{ $problem->name }}
                </option>
            @endforeach
        </select>
    </p>

    <p>
        <label>Solution</label><br>
        <select name="solution_id">
            @foreach($solutions as $solution)
                <option value="{{ $solution->id }}">
                    {{ $solution->name }}
                </option>
            @endforeach
        </select>
    </p>

    <p>
        <label>Suggested KPI</label><br>
        <select name="kpi_id">
            @foreach($kpis as $kpi)
                <option value="{{ $kpi->id }}">
                    {{ $kpi->name }}
                </option>
            @endforeach
        </select>
    </p>

    <p>
    <label>Notes</label><br>
    <textarea name="notes"></textarea>
</p>

<button type="submit">Save Case</button>

</form>
@endsection