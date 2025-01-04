<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'text', 'location', 'image', 'begin_date', 'end_date',
    ];
    protected $casts = [
        'begin_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(PostCategory::class, 'post_post_category', 'post_id', 'post_category_id');
    }
    
}
