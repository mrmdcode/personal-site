<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable =['name',"rsp_id"];
    public $timestamps = false;
    public function menu()
    {
        return $this->hasMany(RSMenu::class,'category_id');
    }
}
