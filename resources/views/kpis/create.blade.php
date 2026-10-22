@extends('layouts.app')

@section('content')
    <h1>Add KPI</h1>
    <form action="{{ route('kpis.store') }}" method="POST">
        @csrf
        @include('kpis._form')
    </form>
@endsection
