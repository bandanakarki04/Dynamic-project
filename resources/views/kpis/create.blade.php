@extends('layouts.app')

@section('title', 'Add KPI')

@section('content')
    <h2>Add KPI</h2>

    <form action="{{ route('kpis.store') }}" method="POST">
        @csrf
        @include('kpis._form')
    </form>
@endsection