<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hospital;
use App\Models\Patient_hospital_medicine;


class Medicine extends Model
{
    use HasFactory;
   
    protected $fillable = ['name', 'type', 'stock', 'expiration'];



    public function hospital(){
        return $this->belongsTo(Hospital::class, 'id_hospital');
    }

    public function patient_hospital_medicines(){
        return $this->hasMany(Patient_hospital_medicine::class);
    }
    
}
