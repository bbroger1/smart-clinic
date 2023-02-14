<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\doctor;
use App\Models\Genre;
use App\Models\QueryStatus;

class Query extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'time', 'date', 'email', 'genre', 'doctor', 'message', 'status'];

    public function getGenre() {
        return $this->hasOne(Genre::class, 'id', 'genre');
    }

    public function getDoctor() {
        return $this->hasOne(Doctor::class, 'id', 'doctor');
    }

    public function getStatus() {
        return $this->hasOne(QueryStatus::class, 'id', 'status');
    }

    public function store(array $data) {
        $this->create($data);
    }


    public function getQueryOfDate($date) {
        return $this->where('date', $date)->get();
    }
}
