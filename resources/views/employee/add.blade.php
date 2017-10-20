@extends ("master.page")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Employee</div>

                <div class="panel-body">
                    <h1> Hello Here is Add Employee </h2>
<form method="POST"  action="addEmployee">
     {{ csrf_field() }}
  <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" name="firstName" aria-describedby="firstNameHelp" placeholder="Enter First Name">
        <small name="firstNameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" name="lastName" aria-describedby="lastNameHelp" placeholder="Enter Last Name">
        <small name="lastNameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
        <small name="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control"name="phone" aria-describedby="phoneHelp" placeholder="Enter Phone">
        <small name="phoneHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" aria-describedby="addressHelp" placeholder="Enter Address">
        <small name="addressHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="jobTitle">Job Title</label>
        <input type="text" class="form-control" name="jobTitle" aria-describedby="jobTitleHelp" placeholder="Enter JobTitle">
        <small name="jobTitleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="salary">Salary</label>
        <input type="text" class="form-control" name="salary" aria-describedby="salaryHelp" placeholder="Enter Salary">
        <small name="salaryHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" name="description" aria-describedby="descriptionHelp" placeholder="Enter Description"> </textarea>
        <small name="descriptionHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="startDate">Start Date</label>
        <input type="text" class="form-control" name="startDate" aria-describedby="startDateHelp" placeholder="Enter Start Date">
        <small name="startDateHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="endDate">End Date </label>
        <input type="text" class="form-control" name="endDate" aria-describedby="endDateHelp" placeholder="Enter endDate ">
        <small name="endDateHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
