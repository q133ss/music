<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lk\FeedbackController\StoreRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('lk.feedback');
    }

    public function store(StoreRequest $request)
    {
        Feedback::create($request->validated());
        return back()->withSuccess('Сообщение успешно отправлено');
    }
}
