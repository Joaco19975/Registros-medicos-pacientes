<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Patient;
use App\Models\Medicine;



class Patient_hospital_medicine extends Model
{
    use HasFactory;

    /*id	id_hospital	id_patient	id_medicine	created_at	updated_at	syntoms	*/

    protected $fillable = ['id_hospital', 'id_patient', 'id_medicine','syntoms', 'name_patient', 'name_medicine'];

    public function hospital(){
        return $this->belongsTo(User::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}
