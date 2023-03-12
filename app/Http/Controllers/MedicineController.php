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

            return MedicineResource::collection(Medicine::search($user, $filtro));
       }
            
       return MedicineResource::collection(Medicine::search($user));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineRequest $request)
    {
      $medicine = Medicine::createMedicine($request->validated());

      return new MedicineResource($medicine);
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
        $medicine = Medicine::findMedicineById($id);

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
        $user = $request->user();

        if($user->id !== $medicine->id_hospital){
            return abort(403, 'Unauthorized action');
        }

        $updatedMedicine = $medicine->updateMedicine($request->validated(), $medicine->id);

        return new MedicineResource($updatedMedicine);
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

        $medicine->deleteMedicine($medicine);
        return response()->json(['success' => 'Record deleted successfully.', 204]);
    }
}
