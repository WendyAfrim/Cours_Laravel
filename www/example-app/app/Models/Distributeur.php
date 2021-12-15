<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributeur extends Model
{
    protected $primaryKey = 'id_distributeur';

    public function films()
    {
        return $this->hasMany(Film::class, 'id_distributeur');
    }
}
