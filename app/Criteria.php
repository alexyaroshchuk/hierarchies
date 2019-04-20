<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = [
        'criteria_name', 'id_parent', 'id_hierarchies',
        'priority'
    ];
}
