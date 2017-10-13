<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['firstName', 'lastName',  'email',  'phone',  'address',  'jobTitle',  'salary',  'description',  'startDate',  'endDate',];
 
}
