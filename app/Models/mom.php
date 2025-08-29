<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class mom extends Model
{
  use HasFactory;
    protected $fillable =[
       'expectation',
        'discussions',
        'actionItems',
        'meeting_id'
    ];
}
