<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user() : BelongsTo {
        return $this->belongsTo(user::class);
    }

    public function thread() : BelongsTo {
        return $this->belongsTo(Thread::class);
    }

}
