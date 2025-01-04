<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; 

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'created_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}