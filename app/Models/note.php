<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class note extends Model
{
    use HasFactory;
    protected $fillable =[
       'content',
        'creationDate',
        'meeting_id'
    ];
}
