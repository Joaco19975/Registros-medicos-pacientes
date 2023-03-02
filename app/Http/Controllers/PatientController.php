<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Patient_hospital_medicine;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if($request->buscador){
            $filtro = $request->buscador;



            return PatientResource::collection(Patient::where('id_hospital', $user->id)
                         ->where('fullname','LIKE' , '%'.$filtro.'%')
                         ->orWhere('dni', 'LIKE', '%'.$filtro.'%')
                         ->paginate(10));

        }
             
        return PatientResource::collection(Patient::where('id_hospital', $user->id)->paginate(10) );
      
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
      $result = Patient::create($request->validated());

      return new PatientResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, Request $request)
    {
        $user = $request->user();
        if($user->id !== $patient->id_hospital){
            return abort(403, 'Unauthorized action');
        }
        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
      $patient->update($request->validated());
      return new PatientResource($patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient, Request $request)
    {
        $user = $request->user();
        if($user->id !== $patient->id_hospital){
            return abort(403, 'Unauthorized action');
        }

        // Obtenemos el valor de la clave primaria del modelo Medicine
        $patient_id = $patient->id;

        // Verificamos si hay registros en la tabla Patient_hospital_medicine con el id_medicine igual al valor de la clave primaria del modelo Medicine
        $patient_hospital_medicine = Patient_hospital_medicine::where('id_medicine', $patient_id)->get();

        // Si hay registros, lanzamos una excepción y no borramos el registro de Medicine
        if ($patient_hospital_medicine->count() > 0) {
            throw new \Exception('Cannot delete Patient record because there are related records.');
        }

        //No hay registros relacionados, asique eliminamos paciente
        $patient->delete();
        return response()->json(['success' => 'Record deleted successfully.', 204]);
    }
}
