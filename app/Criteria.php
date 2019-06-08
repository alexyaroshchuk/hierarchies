<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criterias';
    protected $fillable = [
        'criteria_name', 'id_parent', 'id_hierarchies',
        'priority'
    ];

    public function firstCriteria(){
        return $this->hasMany(Priority::class, 'id_criteria_1');
    }

    public function secondCriteria(){
        return $this->hasMany(Priority::class, 'id_criteria_2');
    }
}
