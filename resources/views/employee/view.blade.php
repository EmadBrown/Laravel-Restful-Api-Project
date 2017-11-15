@extends('layouts.app')


@section('title', '| View Employee ')

@section('content')

    <div class="container">
        <div class="row">
               <div class="col-sm-6">
                    <h2>{{ $employee->firstName }} {{ $employee->lastName }} </h2>
                    <label> Email:   </label>
                            <p class="lead"> {{ $employee->email}}</p>
                  
                    <label> Phone:   </label>
                            <p class="lead"> {{ $employee->phone}}</p>
                    <label> Address:  </label>
                            <p class="lead"> {{ $employee->address}}</p>
                    <label> Job Title:  </label>
                            <p class="lead"> {{ $employee->jobTitle}}</p>
                    <label> Salary:   </label>
                           <p class="lead"> {{ $employee->salary}}</p>
                    <label> Description:   </label>
                            <p class="lead"> {{ $employee->description}}</p>
               </div>
                <div class="col-sm-6">
                    <div class="well">
                        <dl class="dl-horizontal">
                            <dt> Created At:</dt>
                            <dd>{{ date( 'M j,Y h:ia' ,  strtotime($employee->created_at))  }}</dd>
                        </dl>

                          <dl class="dl-horizontal">
                            <dt> Last Updated:</dt>
                            <dd>{{ date( 'M j,Y h:ia' , strtotime($employee->updated_at)) }}</dd>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('employee.edit' , 'Edit' , array($employee->id) , 
                                array('class' =>'btn btn-primary btn-block')) !!}
                            </div>
                               <div class="col-sm-6">
                                      {!!  Form::open(['route' => ['employee.destroy', $employee->id] , 'method' => 'DELETE' ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block' ]) !!}
                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            
    </div>

@endsection
 