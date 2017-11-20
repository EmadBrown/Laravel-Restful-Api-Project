<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use DB;

use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view all the employees from Employees database + Pagination by the last employee has inserted.
        $employees = Employee::orderBy('id' , 'desc')->paginate(10);  //  It can use latest() insteal of orderBy('id' , 'desc')
        
        // return a view and pass in the above variabale
          return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add');
    }

    /**s
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate the data
        $this->validate($request, array(
                'firstName' => 'required|max:225',
                'lastName' => 'required|max:225',
                 'email'  => 'required|email|unique:employees,email',
                'phone' => 'required|max:225',
                'address' => 'required|max:225',
                'jobTitle' => 'required|max:225',
                'salary' => 'required|max:225',
                'description' => 'required|max:225'
        ));
        
 
        // store in the database
            $employee = new Employee();
            
            // inserting data by create (other way)
                    //    $this->employee = $employee;
                    //    employee::create($request->all());
            
            $employee->firstName = $request->firstName;
            $employee->lastName = $request->lastName;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->jobTitle = $request->jobTitle;
            $employee->salary = $request->salary;
            $employee->description = $request->description;
            
            $employee->save();
            
            Session::flash('success','The New Employee was successfully save!');

        // redirect to another page
   return redirect()->route('employee.show' , $employee->id);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.view')->withEmployee($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the employee in the database and save as var
        $employee = Employee::find($id);
        // return the view and in pass in the var we pereviously created
        return view('employee.edit')->withEmployee($employee);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $employee =  Employee::find($id);
         // validate the data
        $this->validate($request, array(
                'firstName' => 'required|max:225',
                'lastName' => 'required|max:225',
               'email'  => 'required|email|unique:employees,email,'.$employee->id,
                'phone' => 'required|max:225',
                'address' => 'required|max:225',
                'jobTitle' => 'required|max:225',
                'salary' => 'required|max:225',
                'description' => 'required|max:225'
        ));
                
        // store in the database where Employee of $id
            $employee =  Employee::find($id);

            $employee->firstName = $request->firstName;
            $employee->lastName = $request->lastName;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->jobTitle = $request->jobTitle;
            $employee->salary = $request->salary;
            $employee->description = $request->description;
            
            $employee->save();
            
            // set flash data with success message
            Session::flash('success','The changes of the Employee  was successfully saved!');

        // redirect  with flash data to  employee.view
        return redirect()->route('employee.show' , $employee->id);
                
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        
        $employee->delete();
        
        Session::flash('success', 'The Employee was successfully deleted');
        
        return redirect()->route('employee.index');
    }
}
