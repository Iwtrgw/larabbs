<?php

namespace App\Http\Services;

use App\Http\Requests\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * UserService 用户服务
 */
class UserService
{

    /**
     *  用户创建
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
            Log::error('用户创建失败',[$e]);
            return false;
        }
    }

    /**
     *  用户更新/编辑
     * @param Request $request
     * @return false
     */
    public function edit(Request $request): bool
    {
        try {
            $uid = $request->get('uid');
            if (!$uid){
                Log::error('非法操作');
                return false;
            }
            $user = User::findById($uid);
            if (!$user){
                Log::error('用户不存在',[$user]);
                return false;
            }
            $data = $request->all();
            return $user->save($data);
        }catch (\Exception $e){
            Log::error('用户更新失败',[$e]);
            return false;
        }
    }

    /**
     * @param $uid
     * @return false
     */
    public function del(Request $request)
    {
        try {
            $rule = Auth::user(['rule']);
            if (!$rule){
                Log::error('无权操作');
                return false;
            }
            return User::where('id',$request->get('uid'))->delete();
        }catch (\Exception $e){
            Log::error('用户删除失败',[$e]);
            return false;
        }
    }
}