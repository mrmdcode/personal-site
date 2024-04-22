<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSReservation extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $fillable = [
        'rsp_id' ,
        'r_s_table_id' ,
        'customer_name' ,
        'customer_phone' ,
        'message' ,
        'date' ,
        'start' ,
        'end' ,

    ];

    public function tables()
    {
        return $this->belongsTo(RSTable::class,'r_s_table_id');
    }
}
