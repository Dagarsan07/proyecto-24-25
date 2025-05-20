<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Partida extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['id_user', 'id_categoria', 'puntuacion', 'tiempo'];

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
