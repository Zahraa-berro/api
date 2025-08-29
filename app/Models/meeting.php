<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class meeting extends Model
{
    
    use HasFactory;
    protected $fillable =[
        'title',
        'agenda',
        'date',
        'time',
        'duration'
    ];

    public function note(){
        return $this->hasMany(note::class);
    }

    public function mom(){
        return $this->hasOne(mom::class);
    }
    
    public function invitation(){
        return $this->hasMany(invitation::class);
    }

}
