@extends('layouts.app')

@section('title' , 'Add New Employee')

@section('parsley-styleshee')

    {!! Html::style('css/parsley.css') !!}

@endsection 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> Add New Employee!</h1>
            <hr>
            {!! Form::open(['route' => 'employee.store' , 'data-parsley-validate' => '']) !!}
                {{ Form::label('firstName' , 'First Name:')  }}
                {{ Form::text('firstName' ,  null , array('class' => 'form-control' , 'required' =>''   )) }}
                
                {{ Form::label('lastName' , 'Last Name:') }}
                {{ Form::text('lastName' ,  null , array('class' => 'form-control' , 'required' =>''  )) }}
                
                {{ Form::label('email' , 'Email:') }}
                {{ Form::text('email' ,  null , array('class' => 'form-control' , 'required' =>'' , 'data-parsley-type' => 'email' )) }}
                
                {{ Form::label('phone' , 'Phone:') }}
                {{ Form::text('phone' ,  null , array('class' => 'form-control' , 'required' =>'' , 'data-parsley-type' => 'number'  )) }}
                
                {{ Form::label('address' , 'Address:') }}
                {{ Form::text('address' ,  null , array('class' => 'form-control' , 'required' =>'')) }}
                
                {{ Form::label('jobTitle' , 'Job Title:') }}
                {{ Form::text('jobTitle' ,  null , array('class' => 'form-control' , 'required' =>'' )) }}
                
                {{ Form::label('salary' , 'Salary:') }}
                {{ Form::text('salary' ,  null , array('class' => 'form-control' , 'required' =>'' , 'data-parsley-type' => 'number')) }}
                
                {{ Form::label('description' , 'Description:') }}
                {{ Form::textarea('description' ,  null , array('class' => 'form-control' , 'required' =>'' )) }}
                <br>
                  {{ Form::submit('Add New Employee' , array('class' => 'btn btn-success btn-lm')) }}
                
           {!! Form::close() !!}
        </div>
    </div>
</div>

@section('parsley-script')

    {!! Html::script('js/parsley.min.js') !!}

@endsection 

@endsection
