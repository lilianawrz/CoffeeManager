<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'productOrders';

    protected $fillable = [
        'quantity',
        'price',
        'order_id',
        'product_id'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal',
        'order_id' => 'integer',
        'product_id' => 'integer'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function getSubTotal()
    {
        return $this->price * $this->quantity;
    }
}