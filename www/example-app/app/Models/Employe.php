<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $foreignKey = 'id_employe';

    public function fonction()
    {
        return $this->belongsTo(Fonction::class, 'id_fonction');
    }
}
