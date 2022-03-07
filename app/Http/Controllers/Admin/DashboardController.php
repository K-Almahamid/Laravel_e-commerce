<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
         $users = User::all();
         return view('admin.users.index',compact('users'));
    }

    public function viewUser($id)
    {
       $users = User::find($id);
       return view('admin.users.view',compact('users'));
    }
}
