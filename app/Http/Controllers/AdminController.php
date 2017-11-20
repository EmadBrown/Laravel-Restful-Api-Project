<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Auth; 

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    
     public function profile()
    {
        $id = Auth::user()->id;
        $admin =  Admin::find($id);
        return view('auth.profile')->withAdmin($admin);
    }  
    
       public function changeNameOrEmail(Request $request )
    {        
        $id = Auth::user()->id;
        $admin =  Admin::find($id); 
        
         // validate the data
        $this->validate($request, array(
                'name' => 'required|max:225',
                'email'  => 'required|email|unique:admins,email,'.$admin->id,
                'current_password' => 'required',
        ));
      
        // check if the old password match with field 
        if (Hash::check($request->current_password, $admin->password)) 
       {        
        // store in the database where Admin of $id
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->save();
            
            // set flash data with success message
            Session::flash('success','The changes of the Changes  were successfully saved!');
       }
       
       else{
            // set flash data with  wrong password message
            Session::flash('danger',' The password is not correct!');
       }    

        // redirect  with flash data to  admin profile view
        return redirect()->route('admin.profile' , $admin->id); 
    }  
    
    public function changePassword(Request $request)
    {        
         // validate the data
        $this->validate($request,
                array(
                    'current_password' => 'required',
                    'password_new' => 'required',
                    'password_confirmation' => 'required|same:password_new' 
                ) , 
                // validate messages
                array(
                'password_confirmation.same' => 'The password confirmation does not match with New password!' 
                )
        );
        
        $id = Auth::user()->id;
        $admin = Admin::find($id)->first();
        // check if the old password match with field 
        if (Hash::check($request->current_password, $admin->password)) 
       {        
             // store in the database where Admin of $id
            $admin->password = hash::make($request->password);
            $admin->save();
            
            // set flash data with success message
            Session::flash('success','The password has changed successfully!');
       }
       
       else{
            // set flash data with wrong password message
            Session::flash('danger',' The current password is not correct!');
       }    
              // redirect  with flash data to  Admin profile view
        return redirect()->route('admin.profile' , $admin->id); 
            
    }  
}
