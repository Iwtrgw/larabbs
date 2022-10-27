<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

/**
 * User model
 */
class User extends Authenticatable {
	use Traits\ActiveUserHelper;
	use Traits\LastActivedAtHelper;
	use HasRoles;
	use Notifiable {
		notify as protected laravelNotify;
	}

    /**
     *
     * @param $instance
     * @return void
     */
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

    /**
     * @var string[]
     */
    protected $dates = ['last_actived_at'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
		return $this->hasMany(Topic::class);
	}

    /**
     * @param $model
     * @return bool
     */
    public function isAuthorOf($model): bool
    {
		return $this->id == $model->user_id;
	}

	// 关联回复表

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
		return $this->hasMany(Reply::class);
	}

	// 清空未读消息标示

    /**
     * @return void
     */
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
