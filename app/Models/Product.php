<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuids;

    protected $fillable = ['name', 'price', 'stock', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
