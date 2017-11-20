<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
         public function profile()
    {
        $id = Auth::user()->id;
        $user =  User::find($id);
        return view('auth.profile')->withUser($user);
    }  
    
       public function changeNameOrEmail(Request $request )
    {        
        $id = Auth::user()->id;
        $user =  User::find($id); 
        
         // validate the data
        $this->validate($request, array(
                'name' => 'required|max:225',
                'email'  => 'required|email|unique:users,email,'.$user->id,
                'current_password' => 'required',
        ));
      
        // check if the old password match with field 
        if (Hash::check($request->current_password, $user->password)) 
       {        
        // store in the database where User of $id
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            
            // set flash data with success message
            Session::flash('success','The changes of the Changes  were successfully saved!');
       }
       
       else{
            // set flash data with  wrong password message
            Session::flash('danger',' The password is not correct!');
       }    

        // redirect  with flash data to  user profile view
        return redirect()->route('user.profile' , $user->id); 
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
        $user = User::find($id)->first();
        // check if the old password match with field 
        if (Hash::check($request->current_password, $user->password)) 
       {        
             // store in the database where User of $id
            $user->password = hash::make($request->password);
            $user->save();
            
            // set flash data with success message
            Session::flash('success','The password has changed successfully!');
       }
       
       else{
            // set flash data with wrong password message
            Session::flash('danger',' The current password is not correct!');
       }    
              // redirect  with flash data to  User profile view
        return redirect()->route('user.profile' , $user->id); 
            
    }  
}
