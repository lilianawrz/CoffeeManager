<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price', 'quantity', 'limitWeight', 'validity', 'category_id', 'company_id', 'image'];

    protected $casts = [
        'price' => 'float',
        'limitWeight' => 'float',
        'quantity' => 'integer',
        'category_id' => "integer",
        'company_id' => "integer"
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
