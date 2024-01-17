<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'tbl_country';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name','currency_name','currency_symbol','flag','country_code','iso_alpha2','iso_alpha3','currency_code','phone_code','iso_numeric'
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        //
    ];

    public $timestamps = true;
}
