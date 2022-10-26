<?php

namespace App\Models;

/**
 * Reply Model
 */
class Reply extends Model {
    /**
     * @var string[]
     */
    protected $fillable = ['content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic() {
		return $this->belongsTo(Topic::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
		return $this->belongsTo(User::class);
	}
}
