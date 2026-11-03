@extends('layouts.app')

@section('content')
    <h1>Edit KPI</h1>
    <form action="{{ route('kpis.update', $kpi) }}" method="POST">
        @csrf
        @method('PUT')
        @include('kpis._form')
    </form>
@endsection
