<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
       return view('portal.dashboard.index');
    }
}
