<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class notification_user extends Model
{
    use HasFactory;
    protected $fillable =[
        'isRead'
    ];
    public $timestamps = false; 
}
