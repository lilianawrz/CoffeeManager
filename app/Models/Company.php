<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';
    protected $fillable = [
        'name',
        'cnpj',
        'email',
        'phone',
        'paymentType',
        'deadline'
    ];

    protected $casts = [
        'deadline' => 'integer'
    ];

    use HasFactory;

}