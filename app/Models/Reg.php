<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Reg extends Model
{
    use HasFactory;

    public const PROPERTIES_KEY = 'p';

    public const PROPERTY_NAMES = [
        'date',
        'board_name',
        'dsp_id',
        'type',
        'standard',
        'arfcn',
        'imei',
        'imsi',
        'rssi',
        'ta',
        'ta_raw',
        'lat',
        'lon',
        'band',
        'session_id',
        'mission_id',
        'serial_id',
        'reg_id'
    ];

    public const PROPERTY_HAS_INT_VALUES = [
        'ta'
    ];

    public $timestamps = false;

    public $fillable = self::PROPERTY_NAMES;

    protected $collection = 'regs';

    protected static function boot()
    {
        parent::boot();

        static::creating(function(self $reg){
//
//            $reg->attributes[self::PROPERTIES_KEY]['date'] = $reg->attributes['date'];
//            unset($reg->attributes['date']);

            $reg->attributes[self::PROPERTIES_KEY]['mission_id'] = $reg->attributes['mission_id'];
            unset($reg->attributes['mission_id']);

            $reg->attributes[self::PROPERTIES_KEY]['session_id'] = $reg->attributes['session_id'];
            unset($reg->attributes['session_id']);

            $reg->attributes[self::PROPERTIES_KEY]['serial_id'] = $reg->attributes['serial_id'];
            unset($reg->attributes['serial_id']);

            $reg->attributes[self::PROPERTIES_KEY]['reg_id'] = $reg->attributes['reg_id'];
            unset($reg->attributes['reg_id']);

            $reg->attributes[self::PROPERTIES_KEY]['imei'] = $reg->attributes['imei'];
            unset($reg->attributes['imei']);

            $reg->attributes[self::PROPERTIES_KEY]['imsi'] = $reg->attributes['imsi'];
            unset($reg->attributes['imsi']);

            $reg->attributes[self::PROPERTIES_KEY]['standard'] = $reg->attributes['standard'];
            unset($reg->attributes['standard']);

            $reg->attributes[self::PROPERTIES_KEY]['loc'] = ['type' => 'Point', 'coordinates' => [$reg->attributes['lon'], $reg->attributes['lat']]];
            unset($reg->attributes['lon']);
            unset($reg->attributes['lat']);

            dump($reg->attributes);
        });
    }
//
//    public function setDateAttribute($value)
//    {
//        $this->attributes['date'] = date;
//    }

    public function setDspIdAttribute($value)
    {
        $this->attributes['dsp_id'] = floatval($value);
    }

    public function setArfcnAttribute($value)
    {
        $this->attributes['arfcn'] = floatval($value);
    }

    public function setImeiAttribute($value)
    {
        $this->attributes['imei'] = floatval($value);
    }

    public function setImsiAttribute($value)
    {
        $this->attributes['imsi'] = floatval($value);
    }

    public function setRssi($value)
    {
        $this->attributes['rssi'] = floatval($value);
    }

    public function setTaAttribute($value)
    {
        $this->attributes['ta'] = intval($value);
    }

    public function setTaRawAttribute($value)
    {
        $this->attributes['ta_raw'] = floatval($value);
    }

    public function setLatAttribute($value)
    {
        $this->attributes['lat'] = floatval($value);
    }

    public function setLonAttribute($value)
    {
        $this->attributes['lon'] = intval($value);
    }

    public function setBandAttribute($value)
    {
        $this->attributes['band'] = intval($value);
    }

}
