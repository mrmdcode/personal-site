<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CURequest extends Model
{

//    Custom Unique Request
    use HasFactory;
    protected $fillable= [
        "name",
        "email",
        "subject",
        "phone",
        "message",
    ];
}
