<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pregunta extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['id_categoria', 'texto', 'tipo'];

    public function respuestas() {
        return $this->hasMany(Respuesta::class, 'id_pregunta');
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
}
