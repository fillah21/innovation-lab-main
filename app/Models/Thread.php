<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(user::class);
    }

    public function comments() : HasMany {
        return $this->hasMany(Comment::class);
    }

    public function hasLike()
    {
        return $this->hasOne(Like::class)->where('likes.user_id', Auth::user()->id);
    }
   
    public function totalLike()
    {
        return $this->hasMany(Like::class)->count();
    }

    public function totalComment()
    {
        return $this->hasMany(Comment::class)->count();
    }

    public function totalThread()
    {
        return $this->hasMany(Thread::class)->count();
    }

    public function scopeFilter($query, array $filters)
    {
        
        $query->when($filters['search'] ?? false, function($query, $search)
        {
            return $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
        });
    }


    public function scopeCategory($query, array $filters)
    {
        $query->when($filters['category_id'] ?? false, function($query, $category)
        {
            return $query->where('category_id', $category);
        });
    }
    
}
