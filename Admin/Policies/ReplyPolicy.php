<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;

/**
 * ReplyPolicy
 */
class ReplyPolicy extends Policy {

    /**
     * @param User $user
     * @param Reply $reply
     * @return bool
     */
    public function update(User $user, Reply $reply) {
		// return $reply->user_id == $user->id;
		return true;
	}

    /**
     * @param User $user
     * @param Reply $reply
     * @return bool
     */
    public function destroy(User $user, Reply $reply) {
		return $user->isAuthorOf($reply) || $user->isAuthorOf($reply->topic);
	}
}
