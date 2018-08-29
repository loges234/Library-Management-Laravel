<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;

class UsersController extends Controller
{


  public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
    		return view('registration.create');
    }
  public function show()
    {
    	$members = Member::latest()->paginate(20);
    	return view('member.show', compact('members'));
    }

}
