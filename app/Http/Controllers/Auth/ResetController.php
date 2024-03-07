<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetController\ResetRequest;
use App\Services\ResetController\IndexService;
use App\Services\ResetController\ResetService;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    public function index(string $token)
    {
        return view('auth.reset', compact('token'));
    }

    public function reset(ResetRequest $request, $token)
    {
        return (new ResetService())->reset($request->validated());
    }
}
