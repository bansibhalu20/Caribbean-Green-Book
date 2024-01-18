<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

      // Table associated with the model
      protected $table = 'tbl_social_media';

      // The attributes that are mass assignable.
      protected $fillable = [
          'name','type','url','business_id',
      ];
  
      // The attributes that should be cast to native types.
      protected $casts = [
          'business_id' => 'integer',
      ];
  
      // Timestamps
      public $timestamps = true;
  
      // Define the relationship with the associated business
      public function business()
      {
          return $this->belongsTo(Business::class, 'business_id');
      }

}
