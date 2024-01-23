<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'tbl_cms';

    // The attributes that are mass assignable.
    protected $fillable = [
        'title','description','image','slug',
    ];

    // Timestamps
    public $timestamps = true;

}
