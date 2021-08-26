<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public const PROPERTIES_KEY = 'properties';

    public const PROPERTY_NAMES = [
        'login',
        'email',
        'first_name',
        'last_name',
        'age',
        'gender',
        'mobile_number',
        'city',
        'car_model',
        'salary'
    ];

    public $timestamps = false;

    public $fillable = self::PROPERTY_NAMES;

    protected $collection = 'persons';

    protected static function boot()
    {
        parent::boot();

        static::creating(function(self $person){
            $person->attributes = [self::PROPERTIES_KEY => $person->attributes];
        });
    }

    public function setAgeAttribute($value)
    {
        $this->attributes['age'] = intval($value);
    }

    public function setSalaryAttribute($value)
    {
        $this->attributes['salary'] = intval($value);
    }

}
