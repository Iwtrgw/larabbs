<?php

namespace App\Models;

use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {
	use Traits\ActiveUserHelper;
	use Traits\LastActivedAtHelper;
	use HasRoles;
	use Notifiable {
		notify as protected laravelNotify;
	}

    public function notify($instance) {
		// 如果要通知的人是当前用户，就不必通知了！
		if ($this->id == Auth::id()) {
			return;
		}

		$this->increment('notification_count');
		$this->laravelNotify($instance);
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'introduction', 'avatar',
	];

	protected $dates = ['last_actived_at'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function topics() {
		return $this->hasMany(Topic::class);
	}

	public function isAuthorOf($model) {
		return $this->id == $model->user_id;
	}

	// 关联回复表
	public function replies() {
		return $this->hasMany(Reply::class);
	}

	// 清空未读消息标示
	public function markAsRead() {
		$this->notification_count = 0;
		$this->save();
		$this->unreadNotifications->markAsRead();
	}

	// 密码哈希
	public function setPasswordAttribute($value) {
		// 如果值的长度等于 60，即认为是已经做过加密的情况
		if (strlen($value) != 60) {

			// 不等于60，做密码加密处理
			$value = bcrypt($value);
		}

		$this->attributes['password'] = $value;
	}

	// 用户头像上传路径处理
	public function setAvatarAttribute($path) {
		// 如果不是 'http' 开头，那就是从后台上传的，需要实例 URL
		if (!starts_with($path, 'http')) {

			// 拼接完整的 URL
			$path = config('app.url') . "/uploads/images/avatars/$path";
		}

		$this->attributes['avatar'] = $path;
	}

}
