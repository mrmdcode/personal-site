<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        "title",
        "type",
        "linkedin",
        "image",
    ];
}
