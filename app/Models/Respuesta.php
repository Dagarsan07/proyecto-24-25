<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Respuesta extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['id_pregunta', 'texto', 'es_correcta'];

    public function pregunta() {
        return $this->belongsTo(Pregunta::class);
    }
}
