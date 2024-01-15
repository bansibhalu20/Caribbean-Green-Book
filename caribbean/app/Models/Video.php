<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'tbl_videos';

    // The attributes that are mass assignable.
    protected $fillable = [
        'title','image','link',
    ];

    // Timestamps
    public $timestamps = true;
}
