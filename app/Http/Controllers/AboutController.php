<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;

/**
 * UsersController
 */
class AboutController extends Controller
{



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
