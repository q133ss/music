<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lk\SettingsController\UpdateRequest;
use App\Services\SettingsController\UpdateService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        return view('lk.settings', compact('user'));
    }

    public function update(UpdateRequest $request)
    {
        return (new UpdateService())->update($request->validated());
    }
}
