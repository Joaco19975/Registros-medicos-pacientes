<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Patient_hospital_medicine;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;

class Patient extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_hospital','fullname','dni', 'sex', 'birth_date'];

    public static function search($user, $filtro = null){

        $query = Patient::where('id_hospital', $user->id);

        if($filtro){
            $query->where(function($q) use($filtro) {
                $q->where('fullname','LIKE' , '%'.$filtro.'%')
                  ->orWhere('dni', 'LIKE', '%'.$filtro.'%')->paginate(10);
            });
        }
    
        return $query->paginate(10);
    }

    public static function createPatient(array $data){
        return Patient::create($data);
    }

    public static function findPatientById($id){
        return Patient::find($id);
    }

    public function updatePatient(array $validatedData){
        $this->update($validatedData);
        return $this;
    }

    public function deletePatient(Patient $patient){
        // Obtenemos el valor de la clave primaria del modelo Patient
        $patient_id = $patient->id;

        // Verificamos si hay registros en la tabla Patient_hospital_medicine con el id_patient igual al valor de la clave primaria del modelo Patient
        $patient_hospital_medicine = Patient_hospital_medicine::where('id_patient', $patient_id)->get();

        // Si hay registros, lanzamos una excepción y no borramos el registro de Medicine
        if ($patient_hospital_medicine->count() > 0) {
            throw new \Exception('Cannot delete Patient record because there are related records.');
        }

        //No hay registros relacionados, asique eliminamos paciente
        $patient->delete();
    }


    public function hospital(){
        return $this->belongsTo(User::class);
    }

    public function patient_hospital_medicines(){
        return $this->hasMany(Patient_hospital_medicine::class, 'id_patient');
    }


}
