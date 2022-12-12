<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function information()
    {
        return $this->hasOne(Information::class, 'contact_uuid', 'uuid');
    }
}
