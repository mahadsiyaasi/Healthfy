<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class roleController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
    	return view("role.role");
    }
}
