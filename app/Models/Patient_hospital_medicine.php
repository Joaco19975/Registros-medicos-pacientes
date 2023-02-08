<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients_hospital_medicine extends Model
{
    use HasFactory;
    //PACIENTE_HOSPITAL_MEDICAMENTO(Id, codigo_med, id_pac, id_hos, fecha)
    protected $fillable = ['created_at'];
}
