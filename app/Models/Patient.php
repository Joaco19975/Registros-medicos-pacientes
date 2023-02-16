<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Patient_hospital_medicine;

class Patient extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_hospital','fullname','dni', 'sex'];


    public function hospital(){
        return $this->belongsTo(User::class);
    }

    public function patient_hospital_medicines(){
        return $this->hasMany(Patient_hospital_medicine::class);
    }


}
