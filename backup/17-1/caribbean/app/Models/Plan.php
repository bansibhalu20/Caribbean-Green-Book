<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'tbl_plans';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name','price','description','yearly_price',
    ];

    // Timestamps
    public $timestamps = true;

}
