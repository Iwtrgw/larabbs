<?php

namespace App\Observers;

use App\Models\Reply;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver {

	// 回复成功 回复数量 +1
	public function created(Reply $reply) {
		$reply->topic->increment('reply_count', 1);
	}

	// XSS 过滤
	public function creating(Reply $reply) {
		$reply->content = clean($reply->content, 'user_topic_body');
	}
}