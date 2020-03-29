<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table= 'employees';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'name',
        'age',
        'email',
        'join_date',
    ];
}
