<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient_hospital_medicine;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Resources\RegistrationResource;

class RegistrationController extends Controller
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

            return RegistrationResource::collection(Patient_hospital_medicine::where('id_hospital', $user->id)
                         ->where('name_patient','LIKE' , '%'.$filtro.'%')
                         ->orWhere('name_medicine', 'LIKE', '%'.$filtro.'%')
                         ->paginate(10));

        }
        
        return RegistrationResource::collection(Patient_hospital_medicine::where('id_hospital', $user->id)->paginate(10));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrationRequest $request)
    {
      $result = Patient_hospital_medicine::create($request->validated());

      return new RegistrationResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient_hospital_medicine $registration, Request $request)
    {
        $user = $request->user();
        if($user->id !== $registration->id_hospital){
            return abort(403, 'Unauthorized action');
        }
        return new RegistrationResource($registration);
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
    public function destroy(Patient_hospital_medicine $registration, Request $request)
    {
        $user = $request->user();
        if($user->id !== $registration->id_hospital){
            return abort(403, 'Unauthorized action');
        }

        $registration->delete();
        return response('', 204);
    }
}
