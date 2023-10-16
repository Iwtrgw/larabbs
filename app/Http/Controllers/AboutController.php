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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('about');
    }


    /**
     *  个人资料编辑页面展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function edit(Request $request)
    {

        return view('about', compact($request->all()));
    }


    /**
     *  个人资料更新
     */
    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user): \Illuminate\Http\RedirectResponse
    {


        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
