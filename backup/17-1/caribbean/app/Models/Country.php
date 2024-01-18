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
        'name','currency_name','currency_icon','flag','country_code',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        //
    ];

    public $timestamps = true;
}
