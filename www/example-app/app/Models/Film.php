<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * The primary key associated to the table
     *
     * @var string
     */
    protected $primaryKey = 'id_film';

    public function distributeur()
    {
        return $this->belongsTo(Distributeur::class, 'id_distributeur');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id_genre');
    }
}
