<?php
namespace App\Services\ForgotController;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotService{

    /**
     * @param string $email
     * @return RedirectResponse
     */
    public function forgot(string $email): RedirectResponse
    {
        $user = User::where('email', $email);

        if(!$user->exists()){
            return back()->withError('Пользователь не найден');
        }

        $token = Str::random(10);
        DB::table('password_resets')->insert(['email' => $email, 'token' => $token]);

        Mail::to($email)->send(new ResetPasswordMail($token));

        return to_route('login')->withSuccess('На вашу почту отправлена ссылка');
    }
}
