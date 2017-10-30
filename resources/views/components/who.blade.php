 @if(Auth::guard('web')->check()) 
        
 <p class="text-success"> 
     You are Logged In as a <stronge>USER</stronge>
 </p>

 @else
 
  <p class="text-danger"> 
     You are Logged Out as a <stronge>USER</stronge>
 </p>
 
 @endif
 
  @if(Auth::guard('admin')->check()) 
        
 <p class="text-success"> 
     You are Logged In as a <stronge>ADMIN</stronge>
 </p>
 
 @else
 
  <p class="text-danger"> 
     You are Logged Out as a <stronge>ADMIN</stronge>
 </p>
 
 @endif

 