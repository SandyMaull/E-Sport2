<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'name', 'username', 'password', 'nmor_wa', 'foto_identitas', 'management', 'motto', 'avatar', 'rank', 'verified'
    ];
}
