<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
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

             return PatientResource::collection(Patient::search($user, $filtro));
        }
             
        return PatientResource::collection(Patient::search($user));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
      $patient = Patient::createPatient($request->validated());

      return new PatientResource($patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $user = $request->user();
        $patient = Patient::findPatientById($id);

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
        $user = $request->user();

        if($user->id !== $patient->id_hospital){
            return abort(403, 'Unauthorized action');
        }

        $updatedPatient = $patient->updatePatient($request->validated());

        return new PatientResource($updatedPatient);
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

        $patient->deletePatient($patient);
        return response()->json(['success' => 'Record deleted successfully.', 204]);
    }
}
