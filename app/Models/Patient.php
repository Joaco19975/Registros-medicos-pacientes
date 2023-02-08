<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    //PACIENTE(Id, id_hospital , nombre_completo, fecha_nacimiento )
    /*      $table->id();
            $table->foreignIdFor(Hospitals::class, 'id_hospital');     
            $table->string('fullname')->nullable();
            $table->string('dni')->nullable();
            $table->string('syntoms')->nullable();
            $table->date(dd, mm, YY)('birth_date');*/ 
    protected $fillable = ['fullname','dni', 'syntoms', 'sex'];
}
