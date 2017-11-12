@extends('layouts.app')


@section('title', '| View Employee ')

@section('content')

    <div class="container">
        <h2>{{ $employee->firstName }} {{ $employee->lastName }} </h2>
            <p class="lead"> {{ $employee->email}}</p>
    </div>

@endsection
 