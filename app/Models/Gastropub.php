<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastropub extends Model
{
    use HasFactory;

    protected $table = 'gastropub';

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'contact_number',
    ];
}
