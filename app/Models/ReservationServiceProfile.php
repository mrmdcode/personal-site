<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationServiceProfile extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $fillable = [
        "companyName",
        "admin_user_id",
        "informationPhone",
        "informationActivity",
        "informationSmTel",
        "informationSmIns",
        "informationSmWh",
    ];

    public function user()
    {
        return $this->belongsTo(User::class,"admin_user_id");
    }

    public function rs_menu()
    {
        return $this->hasMany(RSMenu::class,'rsp_id','id');
    }

    public function template_data()
    {
        return $this->hasOne(RSPTemplateData::class,'rsp_id','id');
    }

    public function tables()
    {
        return $this->hasMany(RSTable::class,'rsp_id');
    }
}
