<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggotas';
    protected $fillable = [
        'name', 'username', 'password', 'nmor_wa', 'foto_identitas', 'pekerjaan', 'avatar', 'rank', 'team', 'verified'
    ];
}
