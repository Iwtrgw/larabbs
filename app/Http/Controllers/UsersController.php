<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller {
	// 个人页面展示
	public function show(User $user) {
		return view('users.show', compact('user'));
	}

	// 个人资料编辑页面展示
	public function edit(User $user) {
		return view('users.edit', compact('user'));
	}

	// 个人资料更新
	public function update(UserRequest $request, User $user) {
		$user->update($request->all());

		return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
	}
}
