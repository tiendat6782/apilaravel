<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        // Add 'category_id' to the $fillable array
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getCate()
    {
        $category = Category::find($this->category_id);
        if ($category) {
            return $category->name;
        } else {
            return "Empty";
        }
    }
    
}
