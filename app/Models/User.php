<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Group;
use App\Models\Siswa;
use App\Models\Sekolah;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [
        'id'
    ];

    public function Group()
    {
        return $this->belongsTo(Group::class);
    }
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function Sekolah(){
        return $this->belongsTo(Sekolah::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
