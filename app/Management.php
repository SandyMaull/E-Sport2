<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'management';
    protected $fillable = [
        'name', 'username', 'password', 'nmor_wa', 'foto_identitas', 'verified'
    ];
}
