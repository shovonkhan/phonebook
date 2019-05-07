<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_name', 'email', 'phone','address','experience','photo','salary','nid','vacation','city'
    ];
}
