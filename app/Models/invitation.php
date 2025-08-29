<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class invitation extends Model
{
    use HasFactory;

        protected $fillable =[
        'attendees',
        'meeting_id',
        'employees_id'
    ];

}
