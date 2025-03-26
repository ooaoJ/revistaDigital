<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'subtitulo', 'conteudo', 'materia_id', 'imagem', 'status', 'user_id'
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'user_id', 'id');
    }
}
