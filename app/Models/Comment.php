<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Newsletter;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'newsletter_id', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }
}
