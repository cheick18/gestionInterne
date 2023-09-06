<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class updateUserController extends Controller
{
    //
    public function store(Request $request, $id)
    {
    

        $user = User::findOrFail($id);
        $request->validate([
           'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email',],
          
        ]);
       


     
            $user->name =$request->name;
            $user->email =$request->email;
            
            if($request->password===Null){
              
            }
            else{
            $user->password = Hash::make($request->password);
            }
         
            
            $user->save();
            return redirect('/dashboard');
      
    }
}
