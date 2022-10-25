<?php

namespace App\Http\Services;

use App\Http\Requests\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

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
        try {
            $data = $request->all();
            if ($data['uid']){
                return false;
            }
            return $user->save();
        }catch (\Exception $e){
            Log::info('用户创建失败',[$e]);
            return false;
        }
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