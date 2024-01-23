<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryReference extends Model
{
   // Table associated with the model
   protected $table = 'tbl_country_reference';

   // The attributes that are mass assignable.
   protected $fillable = [
       'name','currency_name','currency_symbol','iso_alpha2','iso_alpha3','phone_code','iso_numeric','flag','country_code'
   ];

   // The attributes that should be hidden for arrays.
   protected $hidden = [
       //
   ];

   public $timestamps = true;
}
