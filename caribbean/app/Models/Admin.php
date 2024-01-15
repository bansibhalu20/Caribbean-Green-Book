<?php

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_admin';

    protected $fillable = [
        'name', 'email', 'password', 'contact_email', 'address', 'phone', 'image',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;
}

