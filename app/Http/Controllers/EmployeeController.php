<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;

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
          return 'index';
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
                'email' => Rule::unique('employees')->where(function ($query) {  return $query->where('id', 1); }),
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
        return view('employee.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
