<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;
class UsersController extends Controller
{

    public function __construct()
    {
       //dd('test');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::where('role', '2')->get();
        return view('users.index', compact('users'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(\Auth::user()->role == 2) {
            abort(403);
        }
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Users $user)
    {
        //
        //dd($request->all());
        $data = $request->all();
        $data['role'] = 2;
        $path = $request->file('profile')->store('profile');
        $data['profile'] = basename($path);
        $data['password'] = \Hash::make($data['password']);
        $user->fill($data);
        $user->save();
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = new Users;
        $model = $user->find($id);
        return view('users.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Users::find($id);
        $data = $request->all();
        if($request->file('profile')) {

        $path = $request->file('profile')->store('profile');
        $data['profile'] = basename($path);
        }
        $user->fill($data);
        $user->save();
        return redirect('users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Users::find($id)->delete();
        return redirect('users');
    }
}
