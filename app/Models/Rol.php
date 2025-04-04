<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rol extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'roles';

    protected $fillable = ['codigo', 'nombre'];

    public function users() {
        return $this->hasMany(User::class);
    }
}
