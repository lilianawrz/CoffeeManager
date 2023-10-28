<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['moment', 'status', 'client_id', 'payment_id'];

    protected $casts = [
        'moment' => 'date',
        'client_id' => "integer",
        'payment_id' => "integer"
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }
    use HasFactory;
}
