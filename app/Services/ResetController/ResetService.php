<?php
namespace App\Services\ResetController;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResetService{
    public function reset(array $data)
    {
        //data token
        $table = DB::table('password_resets')->where('token', $data['token']);

        if($table->exists()){
            $user = User::where('email', $table->pluck('email')->first())->first();
            $user->update($data);
            Auth::login($user, true);

            $table->delete();
            return to_route('lk.index');
        }else{
            abort(403);
        }
    }
}
