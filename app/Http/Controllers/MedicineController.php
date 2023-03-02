<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Patient_hospital_medicine;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Http\Resources\MedicineResource;

class MedicineController extends Controller
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

            return MedicineResource::collection(Medicine::where('id_hospital', $user->id)
                         ->where('name','LIKE' , '%'.$filtro.'%')
                         ->orWhere('type', 'LIKE', '%'.$filtro.'%')
                         ->paginate(10));

        }

        return MedicineResource::collection(Medicine::where('id_hospital', $user->id)->paginate(10));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineRequest $request)
    {
      $result = Medicine::create($request->validated());

      return new MedicineResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine, Request $request)
    {
        $user = $request->user();
        if($user->id !== $medicine->id_hospital){
            return abort(403, 'Unauthorized action');
        }
        return new MedicineResource($medicine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
      $medicine->update($request->validated());
      return new MedicineResource($medicine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine, Request $request)
    {
        $user = $request->user();
        if($user->id !== $medicine->id_hospital){
            return abort(403, 'Unauthorized action');
        }

             // Obtenemos el valor de la clave primaria del modelo Medicine
            $medicine_id = $medicine->id;

            // Verificamos si hay registros en la tabla Patient_hospital_medicine con el id_medicine igual al valor de la clave primaria del modelo Medicine
            $patient_hospital_medicine = Patient_hospital_medicine::where('id_medicine', $medicine_id)->get();

            // Si hay registros, lanzamos una excepción y no borramos el registro de Medicine
            if ($patient_hospital_medicine->count() > 0) {
                throw new \Exception('Cannot delete Medicine record because there are related records.');
            }

        $medicine->delete();
        return response()->json(['success' => 'Record deleted successfully.', 204]);
    }
}
