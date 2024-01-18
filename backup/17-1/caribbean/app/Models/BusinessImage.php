<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessImage extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'tbl_business_image';

    // The attributes that are mass assignable.
    protected $fillable = [
        'business_id',
        'image',
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
