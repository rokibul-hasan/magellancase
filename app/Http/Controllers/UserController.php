<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::paginate(1);
        $title = 'User List';  
        

        // dd($users);
        return view('users.index',compact('users','title'));
    }
}
