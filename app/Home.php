<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = ['title', 'content', 'address', 'type_bed', 'country', 'city', 'type'];
}
