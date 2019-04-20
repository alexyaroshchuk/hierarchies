<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hierarchy extends Model
{
    protected $table = 'hierarchies';

    protected $fillable = [
        'hierarchies_name', 'id_user'
    ];
}
