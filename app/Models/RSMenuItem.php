<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSMenuItem extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $fillable = [
        "rsp_id",
        "name",
        "description",
        "price",
    ];

    public function rs_menu()
    {
        return $this->belongsTo(RSMenuItem::class);
    }
}
