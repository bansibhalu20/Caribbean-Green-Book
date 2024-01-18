<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    
    protected $table = 'tbl_business';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name','country_id','description','keyword','image','website','email','phone','phone2',
        'plan_id','address','state','city','zipcode','how_old_ur_business','business_industry',
        'is_caribbean_owned','is_felony','hear_about_us','category_id','status',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'how_old_ur_business' => 'integer',
        'zipcode' => 'integer',
    ];

    // Timestamps
    public $timestamps = true;

}
