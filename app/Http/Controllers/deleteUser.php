<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class deleteUser extends Controller
{
    //
    function delete($id){
        dd($id);
        $user= User::find($id);
        $user->delete();
        return redirect('/dashboard');


    }
}
