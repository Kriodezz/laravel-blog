<?php

namespace App\Services\Admin\User;

use App\Models\User;

class Services
{
    public function store($data)
    {
        return User::firstOrcreate(['email' => $data['email']], $data);
    }

    public function update($data, $user)
    {
        $user->update($data);
    }
}
