<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;

class HospitalController extends Controller
{
    // index, show y destroy.

    public function index(){

    }

    public function show(){

    }
    
    public function destroy(){

    }

    public function register(Request $request){
        $hospital = new Hospital;
        $datos = $request->all();
        $hospital->register($datos);
    }
}
