<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Categoria extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['codigo', 'nombre'];

    public function preguntas() {
        return $this->hasMany(Pregunta::class);
    }

    public function partidas() {
        return $this->hasMany(Partida::class);
    }
}
