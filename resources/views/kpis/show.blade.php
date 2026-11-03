@extends('layouts.app')

@section('title', 'KPI Details')

@section('content')
    <h2>{{ $kpi->name }}</h2>

    <p>{{ $kpi->description ?: 'No description.' }}</p>

    <p>
        <a href="{{ route('kpis.edit', $kpi) }}">Edit</a>
        |
        <a href="{{ route('kpis.index') }}">Back to list</a>
    </p>
@endsection