<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class role extends Model
{
     use HasFactory;
    protected $fillable =[
        'type'
    ];
    public $timestamps = false;

    public function user(){
        return $this->hasMany(employees::class);
    }
}
