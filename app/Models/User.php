<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'oib',
        'birth_date',
        'email',
        'phone',
        'street',
        'house_number',
        'city',
        'postal_code',
        'country'
    ];
}
