<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function noticias()
    {
        return $this->hasMany(Noticia::class, 'materia_id', 'id');
    }
}
