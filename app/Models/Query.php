<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'time', 'date', 'email', 'genre', 'doctor', 'message'];


    public function store(array $data) {
        $this->create($data);
    }
}
