<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    use HasFactory;
    //MEDICAMENTO(Id, id_hospital , nombre, tipo, stock, caducidad)
    protected $fillable = ['name', 'type', 'stock', 'expiration'];
    
}
