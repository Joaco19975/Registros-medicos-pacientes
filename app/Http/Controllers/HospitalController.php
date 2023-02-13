<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Patient;

class HospitalController extends Controller
{
    // index, show y destroy.
 

    public function index(){
     /*   $patient = Patient::first();
      return  $patient->hospital;
      */

      return Hospital::all();

    }

    public function patientsHospital(){
       // $escritores = Writer::with('articles')->get();

        $patients = Patient::with('hospital')->get();
        
        return $patients;
    }

    public function hospitalsPatient(){
       return $hospitals = Hospital::with('patients')->get();

    }

    public function show(){

    }
    
    public function destroy(){

    }

    public function register(Request $request){
       
        $hospital = new Hospital();
        $datos = $request->all();
        $hospital->register($datos);
    }
}
