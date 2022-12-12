<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'uuid', 'contact_uuid');
    }
}
