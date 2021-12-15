<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Personne extends Model
{
    protected $primaryKey = 'id_personne';

    public function employe()
    {
        return $this->hasOne(Employe::class, 'id_employe');
    }

    public function getOuvreurs()
    {
        return $this->findEmployeByFunctions('hotesse');
    }

    public function getTechniciens()
    {
        return $this->findEmployeByFunctions('projectionniste');
    }

    public function getMenages()
    {
        return $this->findEmployeByFunctions('agent entretien');
    }

    public function findEmployeByFunctions($fonction)
    {
        $query = Personne::with('employe')
            ->whereHas('employe', function ($query) use ($fonction) {
                $query->whereHas('fonction', function ($query) use ($fonction) {
                    $query->where('nom', '=', $fonction);
                });
            })->get();

        return $query;
    }
}
