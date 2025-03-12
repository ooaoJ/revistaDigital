<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'subtitulo', 'conteudo', 'materia', 'imagem', 'status', 'user_id'
    ];

    public function getMateriaNomeAttribute()
    {
        $materias = [
            1 => 'Artes',
            2 => 'Biologia',
            3 => 'Educação Física',
            4 => 'Filosofia',
            5 => 'Física',
            6 => 'Geografia',
            7 => 'História',
            8 => 'Inglês',
            9 => 'Kids',
            10 => 'Matemática',
            11 => 'Português',
            12 => 'Química',
            13 => 'Sociologia'
        ];

        return $materias[$this->materia] ?? 'Desconhecida';
    }
    
    public function user()
    {
        return $this->belongsTo(Usuario::class, 'user_id', 'id');
    }
}
