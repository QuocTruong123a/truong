<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    private $user;
   public function __construct(User $user)
    {
        
        $this -> user = $user;
    }
    public function login(){
        return view('Admin.Login.login');
    }
    public function getLogout(){
        auth::logout();
        return redirect()->route('admin');
    }
    public function registration(){
        return view('Admin.Login.registration');
    }
    public function store(Request $request)
    {  
    
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required', 
        ],[
            'email.required'=>'Chưa nhập Email',
            'password.required' =>'Chưa nhập mật khẩu'    
        ]);
        // return redirect('admin/Main');
        if(Auth::attempt([
            'email' => $request -> input('email'),
            'password' => $request ->input('password'), 
        ], )){  
            return  redirect() -> route('logins');     
        };
        return redirect()->back()-> with('error','Email hoặc mật khẩu không đúng');   
         }  
         public function registration_post(Request $request){
      
            $this->validate($request, [
                'name' => 'required',  
            ],[
                'name.required'=>'Chưa nhập tên đăng nhập',   
            ]);
                $this -> user -> create([
                    'name' => $request -> name,
                    'email' => $request -> email,
                    'password' => bcrypt($request -> password)
                    
                ]);
                return redirect('login') ;
         }
}
