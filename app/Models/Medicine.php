<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Patient_hospital_medicine;


class Medicine extends Model
{
    use HasFactory;
   
    protected $fillable = ['id_hospital','name', 'type', 'stock', 'expiration'];



    public function hospital(){
        return $this->belongsTo(User::class);
    }

    public function patient_hospital_medicines(){
        return $this->hasMany(Patient_hospital_medicine::class);
    }
    
}
