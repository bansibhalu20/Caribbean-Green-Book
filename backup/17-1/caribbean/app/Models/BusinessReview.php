<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessReview extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'tbl_business_review';

    // The attributes that are mass assignable.
    protected $fillable = [
        'firstname','lastname',  'email', 'business_id', 'star','status',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'business_id' => 'integer',
        'star' => 'integer',
    ];

    // Timestamps
    public $timestamps = true;

    // Define the relationship with the associated business
    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

}
