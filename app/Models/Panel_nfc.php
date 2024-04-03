<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel_nfc extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        "key",
        "Image",
        "Name",
        "Phone",
        "Instagram",
        "Telegram",
        "Rubika",
        "Twitter",
        "WhatsApp",
        "Linkedin",
        "Website",
        "Theme",
    ];
}
