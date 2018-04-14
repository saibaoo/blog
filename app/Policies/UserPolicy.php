<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user,6);
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user,7);
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user,8);
    }

    public function getPermission($user,$p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }
}
