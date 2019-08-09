<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;
class MainController extends Controller
{
    //\
    public function getAll()
    {
        //dd('test');
        $users = Users::where('role', '2')->get();
        return view('users.lists', compact('users'));
    }
}
