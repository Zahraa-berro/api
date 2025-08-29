<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Contracts\OAuthenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class employees extends  Authenticatable implements OAuthenticatable
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

