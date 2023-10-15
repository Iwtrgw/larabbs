<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Requests\UserRequest;

/**
 * UsersController
 */
class AboutController extends Controller
{

    /**
     *  构造方法
     */
    public function __construct()
    {
//        $this->middleware('auth', ['except' => ['show']]);
    }


    /**
     * 个人页面展示
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('about');
    }


    /**
     *  个人资料编辑页面展示
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Request $request)
    {

        return view('about', compact($request->all()));
    }


    /**
     *  个人资料更新
     * @param UserRequest $request
     * @param ImageUploadHandler $uploader
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user): \Illuminate\Http\RedirectResponse
    {

        $this->authorize('update', $user);

        $data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 362);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);

        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
