<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    public function show()
    {
        return redirect('dashboard.show');
    }
    public function admin_settings()
    {
       $admins = User::all();
        return view('auth.admin', compact('admins'));
    }

    public function update(Request $request)
    {
    $validator = Validator::make($request->all(), [
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255',
    'password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
       return redirect()->back()->withErrors($validator);
    }
    else {
    $admin =  User::find(1);
    $admin->name = $request['name'];
    $admin->email = $request['email'];
    $admin->password = bcrypt($request['password']);

    $admin->save();
    return redirect('/');
    }
    
    }
    public function admin() 
    { 
        if (Gate::allows('admin-only', auth()->user())) { return view('admin');
        } return 'Restrictied Area: Admin Only!';
    }
    
    public function register()
    {
      if (Gate::allows('admin-only', auth()->user()))
      {
        return view('register');
      } return 'Restrictied Area: Admin Only!';
    }


}
