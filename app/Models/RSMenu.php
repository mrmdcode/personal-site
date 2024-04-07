<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSMenu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        "rsp_id",
        "category_id",
        "name",
    ];
    public $timestamps =false;

    public function rsp()
    {
        return $this->belongsTo(ReservationServiceProfile::class);
    }

    public function category()
    {
        return $this->belongsTo(RSCategory::class);
    }

    public function MenuItems()
    {
        return $this->hasMany(RSMenuItem::class);
    }
}
