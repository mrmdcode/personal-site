<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSTable extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps  = false;
    protected $fillable= [
        'rsp_id',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(ReservationServiceProfile::class,'rsp_id');
    }

    public function dis_times()
    {
        return $this->hasMany(RSReservation::class,'r_s_table_id');
    }
}
