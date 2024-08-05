<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'table_id',
        'reservation_service_profiles_id',
        'order_taker_id',
        'status',
        'customer_name',
        'customer_phone',
    ];

    public function rs_menu_items()
    {
        return $this->belongsToMany(RSMenuItem::class, 'r_s_item_order')
            ->withPivot('qty');
    }

    public function rs_table()
    {
        return $this->belongsTo(RSTable::class,'table_id');
    }

    public function order_taker()
    {
        return $this->belongsTo(User::class,'order_taker_id');
    }
}
