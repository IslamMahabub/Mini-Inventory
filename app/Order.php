<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_date',
        'product_id',
        'supplier_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\User', 'supplier_id');
    }
}
