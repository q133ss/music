<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('lk.index');
    }
}
