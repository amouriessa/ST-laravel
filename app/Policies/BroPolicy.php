<?php

namespace App\Policies;

use App\Models\Bro;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BroPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create_karyawan(User $user){
        return in_array($user->role, ['spv', 'manager']);
    }

    public function update_karyawan(User $user, Bro $bro){
        return $user->role === 'spv';
    }

    public function delete_karyawan(User $user, Bro $bro)
{
    return $user->role === 'manager';
}



}
