<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','description','date_start','date_end', 'seat','points','link','user_id'];
}
