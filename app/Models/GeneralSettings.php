<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    protected $fillable = [
        'field_name',
        'value',
        'status'
    ];
}
