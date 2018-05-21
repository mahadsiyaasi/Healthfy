<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class printController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function print()
    {
    		return View('print.print');
    }
}
