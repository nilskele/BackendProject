<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; // Ensure that the Comment class exists in this namespace

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'created_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}