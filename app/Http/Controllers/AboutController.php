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




}
