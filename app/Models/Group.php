<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function Group()
    {
        return $this->hasMany(User::class);
    }
}
