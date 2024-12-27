<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['user_name', 'email', 'question', 'answer', 'is_answered', 'category_id'];

    // Define the relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
