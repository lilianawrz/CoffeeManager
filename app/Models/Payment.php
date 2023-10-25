<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['name', 'moment'];
    protected $casts = [
        'moment' => 'date'
    ];


    use HasFactory;
}