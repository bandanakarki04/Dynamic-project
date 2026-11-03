@extends('layouts.app')

@section('title', 'Edit KPI')

@section('content')
    <h2>Edit KPI</h2>

    <form action="{{ route('kpis.update', $kpi) }}" method="POST">
        @csrf
        @method('PUT')
        @include('kpis._form')
    </form>
@endsection