<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class apiController extends Controller
{
	
	public function users()
	{
		return response()->json(User::all(),200);
	}
	public function login(Request $req)
	{
	//$credentials = $req->only('email', 'password');

        return response()->json($req->email);
	}
	 public function gethome()
    {
      return View("register.patients.register");
    }
}
