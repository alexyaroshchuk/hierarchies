<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $table = 'alternatives';
    protected $fillable = [
        'name_alternatives', 'id_hierarchies', 'priority_vector'
    ];
}
