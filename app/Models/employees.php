<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class employees extends  Authenticatable
{
    use HasFactory,HasApiTokens;
    protected $fillable =[
        'firstName',
        'lastName',
        'email',
        'password',
        "role_id"
    ];
    public $timestamps = false;
    public function invitation(){
        return $this->hasOne(invitation::class);
    }
}

