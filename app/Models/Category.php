<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Category Model
 */
class Category extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'description',
    ];
}
