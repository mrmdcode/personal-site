<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSMenuItem extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public $timestamps = false;
    protected $fillable = [
        "r_s_menu_id",
        "name",
        "description",
        "price",
    ];

    public function rs_menu()
    {
        return $this->belongsTo(RSMenu::class,'r_s_menu_id');
    }
}
