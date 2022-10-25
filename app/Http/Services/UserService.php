<?php

namespace App\Http\Services;

use App\Http\Requests\Request;
use App\Models\User;

/**
 * UserService 用户服务
 */
class UserService
{

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function save(User $user, Request $request): bool
    {
        $data = $request->all();
        if ($data['uid']){
            return false;
        }
        return $user->save();
    }

    /**
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {

    }

    /**
     * @param $uid
     * @return void
     */
    public function del($uid)
    {

    }
}