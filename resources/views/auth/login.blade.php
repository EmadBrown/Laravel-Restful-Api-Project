
@extends('master.page')

@section('content')


<h2>Login Form</h2>
<div class="container">
    <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <form action="" method="POST">
              <ul class="nav navbar-nav"><a href ="forgotpassword" >Forgot Password?</a>       
              </form>
              <br>

            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                Check me out
              </label>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
</div>


@endsection