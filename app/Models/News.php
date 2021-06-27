<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category_news()
    {
        return $this->belongsTo(CategoryNews::class, 'category_news_id', 'id');
    }
}
