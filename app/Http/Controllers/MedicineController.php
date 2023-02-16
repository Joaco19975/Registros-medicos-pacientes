<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Http\Requests\StoreMedicineRequest;
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
        return MedicineResource::collection(Medicine::where('id_hospital', $user->id));
        
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

        $medicine->delete();
        return response('', 204);
    }
}
