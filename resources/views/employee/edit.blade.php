 @extends('layouts.app')
 
 @section('title' , '| Edit Employee')
 
 
 @section('content')
 
   <div class="container">
        <div class="row">
            {!! Form::model($employee, ['route' => ['employee.update', $employee->id ], 'method' => 'PUT' ]) !!}
               <div class="col-sm-6">
                    {{ Form::label('firstName' , 'First Name:')  }}
                {{ Form::text('firstName' ,  null , array('class' => 'form-control' , 'required' =>'' )) }}
                
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
                                   {{ Form::submit('Save Changes' , ['class' => 'btn btn-success  btn-block'] ) }}
                            </div>
                               <div class="col-sm-6">
                                  {!! Html::linkRoute('employee.show' , 'Cancel' , array($employee->id) , 
                                  array('class' =>'btn btn-danger  btn-block')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
            
    </div>

 @endsection