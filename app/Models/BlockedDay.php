<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedDay extends Model
{
    use HasFactory;

    protected $fillable = ['date'];


    public function store(string $date)
    {
        return $this->create([
            'date' => $date,
        ]);
    }


    public function isBlockedDay(string $date)
    {
        return $this->where('date', $date)->first();
    }

    public function freeDay(string $date)
    {
        return $this->where('date', $date)->delete();
    }

    public function get(string $date) 
    {
        $splitDate = explode('-', $date);
        return $this->select('date')
                    ->whereYear('date', $splitDate[0])
                    ->whereMonth('date', $splitDate[1])
                    ->get()
                    ->toArray();
    }
}
