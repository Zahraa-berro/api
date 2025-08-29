<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class notification extends Model
{
    use HasFactory;
    protected $fillable =[
        'content',
        "dateOfCreation",
        'timeOfSend'
    ];
    public $timestamps = false;
}
