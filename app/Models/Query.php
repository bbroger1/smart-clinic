<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'time', 'date', 'email', 'genre_id', 'doctor_id', 'message'];
}
