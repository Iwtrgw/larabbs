<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\Request;
use App\Http\Requests\UserRequest;
use App\Models\Content;

/**
 *  内容控制
 * Class ContentController
 * @package App\Http\Controllers
 */
class ContentController extends Controller
{

    /**
     * ContentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    // 内侧详情页面展示

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // 内侧编辑页面展示

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {

        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    // 内容更新

    /**
     * @param UserRequest $request
     * @param ImageUploadHandler $uploader
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
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

        return redirect()->route('users.show', $user->id)->with('success', '内容更新成功！');
    }

    /**
     *  删除
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function delContent(Request $request, $id='')
    {
        $content = Content::find($id);
        if (!$content){
            return redirect();
        }
        $content->delete();
        return view('users.show');
    }

    /**
     *  状态改变
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function changedStatus(Request $request, $id)
    {
        $content = Content::find($id);
        if (!$content){
            return redirect();
        }
        $content->status  = $content->status ? 0 :1;
        $content->save();
        return view('users.show');
    }
}
