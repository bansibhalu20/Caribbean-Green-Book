<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newslatter extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'tbl_newsletter';

    // The attributes that are mass assignable.
    protected $fillable = [
        'email',
    ];

    // Timestamps
    public $timestamps = true;

}
