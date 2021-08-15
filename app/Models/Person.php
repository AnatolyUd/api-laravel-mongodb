<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $table = 'persons';

    public $timestamps = false;

}
