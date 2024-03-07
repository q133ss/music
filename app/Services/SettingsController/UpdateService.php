<?php
namespace App\Services\SettingsController;

use Illuminate\Support\Facades\Hash;

class UpdateService{
    public function update(array $data)
    {
        $data['password'] = Hash::make($data['new_password']);
        unset($data['old_password']);
        unset($data['new_password']);

        Auth()->user()->update($data);
        return back()->withSuccess('Профиль успешно изменен');
    }
}
