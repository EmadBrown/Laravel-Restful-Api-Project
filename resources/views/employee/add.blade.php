@extends('layouts.app')

@section('title' , '| Add New Employee')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> Add New Employee!</h1>
            <hr>
            {!! Form::open(['route' => 'employee.store']) !!}
                {{ Form::label('firstName' , 'First Name:')  }}
                {{ Form::text('firstName' ,  null , array('class' => 'form-control')) }}
                
                {{ Form::label('lastName' , 'Last Name:') }}
                {{ Form::text('lastName' ,  null , array('class' => 'form-control')) }}
                
                {{ Form::label('email' , 'Email:') }}
                {{ Form::text('email' ,  null , array('class' => 'form-control')) }}
                
                {{ Form::label('phone' , 'Phone:') }}
                {{ Form::text('phone' ,  null , array('class' => 'form-control')) }}
                
                {{ Form::label('address' , 'Address:') }}
                {{ Form::text('address' ,  null , array('class' => 'form-control')) }}
                
                {{ Form::label('jobTitle' , 'Job Title:') }}
                {{ Form::text('jobTitle' ,  null , array('class' => 'form-control')) }}
                
                {{ Form::label('salary' , 'Salary:') }}
                {{ Form::text('salary' ,  null , array('class' => 'form-control')) }}
                
                {{ Form::label('description' , 'Description:') }}
                {{ Form::textarea('description' ,  null , array('class' => 'form-control')) }}
                <br>
                  {{ Form::submit('Add New Employee' , array('class' => 'btn btn-success btn-lm')) }}
                
           {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
