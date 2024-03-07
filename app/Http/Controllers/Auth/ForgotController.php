<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ForgotController\ForgotService;
use Illuminate\Http\Request;

class ForgotController extends Controller
{
    public function index()
    {
        return view('auth.forgot');
    }

    public function forgot(Request $request)
    {
        return (new ForgotService())->forgot($request->get('email'));
    }
}
