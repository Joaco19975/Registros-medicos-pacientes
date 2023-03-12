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


    public static function search($user, $filtro = null){

        $query = Medicine::where('id_hospital', $user->id);

        if($filtro){
            $query->where(function($q) use($filtro) {
                    $q->where('name','LIKE' , '%'.$filtro.'%')
                    ->orWhere('type', 'LIKE', '%'.$filtro.'%')->paginate(10);
                });
        }
    
        return $query->paginate(10);
    }

    public function createMedicine(array $data){
        return Medicine::create($data);
    }

    public static function findMedicineById($id){
        return Medicine::find($id);
    }

    public function updateMedicine(array $validatedData, $id){
        $this->update($validatedData);

        $medicine = $this->findMedicineById($id);

        $registros = Patient_hospital_medicine::where('id_medicine', $medicine->id)->get();
        // Luego, para cada registro recuperado, podría actualizar el nombre de la medicina:

       foreach ($registros as $registro) {
           $registro->name_medicine = $medicine->name;
           $registro->save();
       }

        return $this;
    }

    public function deleteMedicine(Medicine $medicine){
        // Obtenemos el valor de la clave primaria del modelo Medicine
        $medicine_id = $medicine->id;

        // Verificamos si hay registros en la tabla Patient_hospital_medicine con el id_patient igual al valor de la clave primaria del modelo Patient
        $patient_hospital_medicine = Patient_hospital_medicine::where('id_medicine', $medicine_id)->get();

        // Si hay registros, lanzamos una excepción y no borramos el registro de Medicine
        if ($patient_hospital_medicine->count() > 0) {
            throw new \Exception('Cannot delete Medicine record because there are related records.');
        }

        //No hay registros relacionados, asique eliminamos paciente
        $medicine->delete();
    }

    public function hospital(){
        return $this->belongsTo(User::class);
    }

    public function patient_hospital_medicines(){
        return $this->hasMany(Patient_hospital_medicine::class, 'id_medicine');
    }
    
}
