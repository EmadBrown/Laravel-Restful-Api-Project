
@extends('layouts.app')

@section('title', '| View Employees')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employee</div>

                <div class="panel-body">
                   @foreach ($employees as $employee)
                            <i>{{ $employee->id   }} </i>
                            <i> {{ $employee->firstName  }}</i>
                            <i>{{  $employee->lastName }}</i>
                            </br>
                            <!--<i> <a href="{{ $employee->id }}/view" class="btn btn-danger">View</a>-->
                    @endforeach
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    