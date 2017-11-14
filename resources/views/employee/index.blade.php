
@extends('layouts.app')

@section('title', '| View Employees')

@section('content')
<div class="container">
        <div class="row">
                 <div class="col-md-9">
                            <h1>All The Employees </h1>
                 </div>
                  <div class="col-md-3">
                      <a href="{{ route( 'employee.create' ) }}" class="btn btn-primary  btn-h1-spacing btn-lg btn-block">
                          Create New Employee
                      </a>
                 </div>
        </div>
        <div class="row">
                 <div class="col-md-12">
                       
                        <table class="table">
                                    <thead>
                                                <th> ID</th>
                                                 <th>First Name</th>
                                                 <th>Last Name</th>
                                                  <th>Description</th>
                                    </thead>
                                    <tbody>
                                          @foreach ($employees as $employee)
                                            <tr>
                                                        <th> {{ $employee->id }} </th>
                                                        <th> {{ $employee->firstName }} </th>
                                                        <th> {{ $employee->lastName }} </th>
                                                        <th> {{ substr($employee->description, 0 , 10) }} {{ strlen($employee->description) > 10 ? "..." : ""}} </th>
                                                        <th>  {!! Html::linkRoute('employee.show' , 'View' , array($employee->id) , 
                                                                     array('class' =>'btn btn-success  btn-block')) !!}
                                                        </th>
                                                        <th>  {!! Html::linkRoute('employee.edit' , 'Edit' , array($employee->id) , 
                                                                         array('class' =>'btn btn-primary btn-block')) !!} 
                                                        </th>
                                                        <th>  {!! Html::linkRoute('employee.destroy' , 'Delete' , array($employee->id) , 
                                                                        array('class' =>'btn btn-danger  btn-block')) !!} 
                                                        </th>
                                            </tr>
                                            @endforeach
                                    </tbody>
                  </div>
        </div>
</div>
@endsection
    