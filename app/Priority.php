<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priority';

    protected $fillable = [
        'id_criteria_1', 'id_criteria_2', 'priority', 'id_hierarchies'
    ];
}
