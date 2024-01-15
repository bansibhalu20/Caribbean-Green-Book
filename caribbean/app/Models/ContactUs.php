<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'tbl_contact_us';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name','email','subject','phone','message',
    ];

    // Timestamps
    public $timestamps = true;

}
