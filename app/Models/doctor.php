<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Area;
use App\Models\Genre;

use Illuminate\Support\Facades\DB;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'lastName', 'phoneNumber', 'cpf', 'genre', 'city', 'uf', 'area'];

    public function getGenre()
    {
        return $this->hasOne(Genre::class, 'id');
    }

    public function getArea()
    {
        return $this->hasOne(Area::class, 'id');
    }

    public function getAllDoctors()
    {
        return $this->withTrashed()->paginate(12);
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

    public function findDoctor(int $id)
    {
        return $this->find($id);
    }


    public function updateDoctor(array $data, int $id)
    {
        return $this->findDoctor($id)->update($data);
    }
}
