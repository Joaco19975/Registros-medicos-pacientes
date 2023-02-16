<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // index, show y destroy.
         
 

    public function index(){
     /*   $patient = Patient::first();
      return  $patient->hospital;
      */

  

    }

    public function getMedicinesHospital(){
            $id = Auth::id();
            $hospital = User::find($id);
            $medicine = $hospital->medicines;
           
            return response()->json($medicine);
    }


    public function getPatientsHospital(){
        $id = Auth::id();
        $hospital = User::find($id);
        $patients = $hospital->patients;

        return response()->json($patients);
    }

    public function hospitalsPatient(){
       return $hospitals = Hospital::with('patients')->get();

    }

    public function show(){

    }
    
    public function destroy(){

    }

    public function register(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|unique:users,email',
            'phone' => 'required|max:11',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password'])
        ]);

        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request){
    $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => [
                'required'
            ],
            'remember' => 'boolean'
        ]);

        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if(!Auth::attempt($credentials, $remember)){
            return response ([
                'error' => 'The Provided credentials are not correct'

            ], 422);
        }

        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(){
        $user = Auth::user();

        $user->currentAccessToken()->delete();

        return response([
            'success' => true,

        ]);
    }
    
}
