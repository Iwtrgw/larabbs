<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\Request;
use App\Http\Requests\UserRequest;
use App\Models\Content;

/**
 *  消息
 * Class MessageController
 * @package App\Http\Controllers
 */
class MessageController extends Controller
{

    /**
     * ContentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    // 消息页面

    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Message $message)
    {
        return view('message.show', compact('message'));
    }

    /**
     *  编辑
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $message = Message::find($id);
        return view('message.edit',compact('message'));
    }


}
