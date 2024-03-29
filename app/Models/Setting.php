<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'icon',
        'myPic',
        'myName',
        'myPosition',
        'metaKeyword',
        'metaDescription',
        'metaAuthor',
        'metaCopyright',
        'metaRobots',
        'metaLang',
        'metaVoTitle',
        'metaVoDescription',
        'metaVoType',
        'metaVoUrl',
        'metaVoImage',
    ];
    public $timestamps =false;
}
