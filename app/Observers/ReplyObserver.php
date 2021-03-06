<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver {

	// 回复成功 回复数量 +1
	public function created(Reply $reply) {
		$topic = $reply->topic;
		$reply->topic->increment('reply_count', 1);

		// 通知作者话题被回复了
		$topic->user->notify(new TopicReplied($reply));
	}

	// XSS 过滤
	public function creating(Reply $reply) {
		$reply->content = clean($reply->content, 'user_topic_body');
	}

	// 评论删除回复数量总数 -1
	public function deleted(Reply $reply) {

		if ($reply->topic->reply_count > 0) {
			$reply->topic->decrement('reply_count', 1);
		}
	}
}