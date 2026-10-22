@extends('layouts.app')

@section('content')
    <h1>{{ $kpi->name }}</h1>
    <p>{{ $kpi->description ?: 'No description.' }}</p>
    <p><a href="{{ route('kpis.edit', $kpi) }}">Edit</a> | <a href="{{ route('kpis.index') }}">Back to list</a></p>
@endsection
