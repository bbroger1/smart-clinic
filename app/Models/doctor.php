<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Support\Facades\DB;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'lastName', 'phoneNumber', 'cpf', 'genre', 'city', 'uf', 'area'];


    public function getAllDoctors(int $page)
    {
        $doctors = DB::table('doctors')
            ->join('areas', 'doctors.area', '=', 'areas.id')
            ->join('genres', 'doctors.genre', '=', 'genres.id')
            ->select('doctors.*', 'areas.area', 'genres.genre')
            ->skip(12 * $page)
            ->take(12)
            ->get();

        return $doctors;
    }
    
    public function store(array $data)
    {
        return $this->create($data);
    }

    public function deleteDoctorWithId(int $id)
    {
        return $this->find($id)->delete();
    }

    public function reactivateDoctorWithId(int $id)
    {
        return $this->where('id', $id)->restore();
    }
}
