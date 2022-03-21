<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    private $users;

    public function __construct(User $user)
    {
        
        $this -> user = $user;
    }
    public function create(){
        return view('Admin.user.add');
    }
    public function list(){
        $user = $this -> user  -> paginate(5);
        return view('Admin.user.list', compact('user'));
    }
    public function store(Request $request){
        $this->validate($request, [
          'name' => 'required',  
      ],[
          'name.required'=>'Chưa nhập danh mục',   
      ]);
          $this -> user -> create([
              'name' => $request -> name,
              'email' => $request -> email,
              'password' => bcrypt($request -> password)
              
          ]);
          return redirect('admin/user/create') ;
      }
      public function edit($id){
        $user = $this -> user -> find($id);
        
          return view('Admin.user.edit',compact('user'));
         
      }
      public function update($id,Request $request){

            $this -> user ->find($id)->update([
                'name' => $request -> name,
                'email' => $request -> email,              
              ]); 
              
          return redirect('admin/user/list') ;
          }
          public function delete($id){
            $this -> user->find($id)->delete();
            return redirect('admin/user/list') ;
          }
}
