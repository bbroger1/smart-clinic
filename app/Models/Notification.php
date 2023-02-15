<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['message'];


    public function store(string $message) {
        return $this->create(['message' => $message]);
    }

    public function getNotifications() {
        return $this->select()->limit(3)->get();
    }
}
