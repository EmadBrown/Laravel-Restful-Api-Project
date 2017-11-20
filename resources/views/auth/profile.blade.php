@extends('layouts.app')

@section('title' , '|  Profile')

@section('parsley-styleshee')

    {!! Html::style('css/parsley.css') !!}

@endsection 

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
            <!-- Admin profile -->
               @if (Auth::guard('admin')->check())
            
                <h1>{{ $admin->name }}</h1>
                <hr>
                {!! Form::model($admin, ['route' => ['admin.change-name-email', $admin->id ], 'method' => 'PUT' ] )!!}
                    <div class="form-group">
                          {{ Form::label('name' , 'Name:' , ['class' =>  'control-label showlable'] ) }}
                            <p class="show"> {{ $admin->name }}</p>
                          {{ Form::text('name' ,  null , array('class' => 'form-control change hidden',  'required' =>'')) }}
                    </div>
          
                    <div class="form-group">
                            {{ Form::label('email' , 'Email:' , ['class' => 'control-label showlable']) }}
                              <p class="show"> {{ $admin->email }} </p>
                            {{ Form::text('email' ,  null , array('class' => 'form-control change hidden' ,  'required' =>'')) }}
                    </div>
                
                    <div class="form-group change hidden">
                            <label for="current_password">Password:</label>
                            <input type="password" name="current_password" class="form-control" id="current_password" required = "" placeholder="Password">
                    </div>

                <div class="button-email-name hidden">
                    <div class="row ">
                        <div class="col-sm-6">
                               {{ Form::submit('Save Changes' , ['class' => 'btn btn-success  btn-block '] ) }}
                        </div>
                           <div class="col-sm-6">
                              {!! Html::linkRoute('admin.profile' , 'Cancel' , array($admin->id) , 
                              array('class' =>'btn btn-danger  btn-block ')) !!}
                        </div>
                    </div>
                </div>
                    
                {!! Form::close() !!}
                
                {!! Form::model($admin, ['route' => ['admin.change-password', $admin->id ], 'method' => 'PUT' ] )!!}
                    
                    <div class="password hidden">
                          <div class="form-group ">
                                    {{ Form::label('current_password' , 'Current Password:' , ['class' => ' control-label']) }}
                                    {{ Form::token() }}
                                    <input type="password" name="current_password" class="form-control" id="current_password" required = "" placeholder="Current Password">
                            </div>
                        
                            <div class="form-group ">
                                    {{ Form::label('password_new' , 'New Password:' , ['class' => 'control-label'] ) }}
                                    <input  class="form-control" type="password" name="password_new" placeholder="New Password" data-parsley-type="alphanum" data-parsley-min="7" data-parsley-trigger="focusin focusout" data-parsley-error-message="Password must be atleast 7 characters" data-parsley-errors-container="#error-container" id="password_new">
                            </div>
                             
                            <div class="form-group ">
                                    {{ Form::label('password_confirmation' , 'Re-enter Password:' , ['class' => 'control-label']) }}
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"  data-parsley-trigger="focusin focusout" data-parsley-error-message="Password Does not match" data-parsley-errors-container="#error-container" data-parsley-equalto="#password_new">
                             </div>
                    </div>
                        
                  <br>

                <div class="row">
                    <div class="col-sm-6">
                        <a  href="#name/email" class="show btn btn-primary btn-block">Change Name / Email </a>
                           {{ Form::submit('Save Changes' , ['class' => 'btn btn-success  btn-block button-password hidden'] ) }}
                    </div>
                       <div class="col-sm-6">
                            <a  href="#password" class="show btn btn-danger btn-block">Change Password</a>
                          {!! Html::linkRoute('admin.profile' , 'Cancel' , array($admin->id) , 
                          array('class' =>'btn btn-danger  btn-block button-password  hidden')) !!}
                    </div>
                </div>

               {!! Form::close() !!}
             
                 @else

                <h1>{{ $user->name }}</h1>
                <hr>
                {!! Form::model($user, ['route' => ['user.change-name-email', $user->id ], 'method' => 'PUT' ] )!!}
                    <div class="form-group">
                          {{ Form::label('name' , 'Name:' , ['class' =>  'control-label showlable'] ) }}
                            <p class="show"> {{ $user->name }}</p>
                          {{ Form::text('name' ,  null , array('class' => 'form-control change hidden',  'required' =>'')) }}
                    </div>
          
                    <div class="form-group">
                            {{ Form::label('email' , 'Email:' , ['class' => 'control-label showlable']) }}
                              <p class="show"> {{ $user->email }} </p>
                            {{ Form::text('email' ,  null , array('class' => 'form-control change hidden' ,  'required' =>'')) }}
                    </div>
                
                    <div class="form-group change hidden">
                            <label for="current_password">Password:</label>
                            <input type="password" name="current_password" class="form-control" id="current_password" required = "" placeholder="Password">
                    </div>

                <div class="button-email-name hidden">
                    <div class="row ">
                        <div class="col-sm-6">
                               {{ Form::submit('Save Changes' , ['class' => 'btn btn-success  btn-block '] ) }}
                        </div>
                           <div class="col-sm-6">
                              {!! Html::linkRoute('user.profile' , 'Cancel' , array($user->id) , 
                              array('class' =>'btn btn-danger  btn-block ')) !!}
                        </div>
                    </div>
                </div>
                    
                {!! Form::close() !!}
                
                {!! Form::model($user, ['route' => ['user.change-password', $user->id ], 'method' => 'PUT' ] )!!}
                    
                    <div class="password hidden">
                          <div class="form-group ">
                                    {{ Form::label('current_password' , 'Current Password:' , ['class' => ' control-label']) }}
                                    {{ Form::token() }}
                                    <input type="password" name="current_password" class="form-control" id="current_password" required = "" placeholder="Current Password">
                            </div>
                        
                            <div class="form-group ">
                                    {{ Form::label('password_new' , 'New Password:' , ['class' => 'control-label'] ) }}
                                    <input  class="form-control" type="password" name="password_new" placeholder="New Password" data-parsley-type="alphanum" data-parsley-min="7" data-parsley-trigger="focusin focusout" data-parsley-error-message="Password must be atleast 7 characters" data-parsley-errors-container="#error-container" id="password_new">
                            </div>
                             
                            <div class="form-group ">
                                    {{ Form::label('password_confirmation' , 'Re-enter Password:' , ['class' => 'control-label']) }}
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"  data-parsley-trigger="focusin focusout" data-parsley-error-message="Password Does not match" data-parsley-errors-container="#error-container" data-parsley-equalto="#password_new">
                             </div>
                    </div>
                        
                  <br>

                <div class="row">
                    <div class="col-sm-6">
                        <a  href="#name/email" class="show btn btn-primary btn-block">Change Name / Email </a>
                           {{ Form::submit('Save Changes' , ['class' => 'btn btn-success  btn-block button-password hidden'] ) }}
                    </div>
                       <div class="col-sm-6">
                            <a  href="#password" class="show btn btn-danger btn-block">Change Password</a>
                          {!! Html::linkRoute('user.profile' , 'Cancel' , array($user->id) , 
                          array('class' =>'btn btn-danger  btn-block button-password  hidden')) !!}
                    </div>
                </div>

               {!! Form::close() !!}
             
                               
                @endif
              </div>
        </div>
</div>

@endsection

@section('parsley-script')

    {!! Html::script('js/parsley.min.js') !!}

@endsection 

@section('script')
<script>
 
    $(document).ready(function()
    {

        $('a[ href="#name/email"]').on('click', function() {
            $('a[ href="#name/email"], .show').addClass('hidden');
            $('.change , .button , .button-email-name ').removeClass('hidden');

        });

        $('a[ href="#password"]').on('click', function() {
            $('a[ href="#password"] , .show , .showlable').addClass('hidden');
            $('.password , .button-password').removeClass('hidden');
        });

    });

</script>

@endsection


