<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Patient_hospital_medicine;

  

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone' ,'password'];
    
    public function register(array $data){



/*
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('hospitals'),
            ],
            'phone' => 'max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
            }else{
                $hospital = Hospital::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => bcrypt($data['password'])
                ]);
                
                $token = $hospital->createToken('main')->plainTextToken;
            
        }
        */
    }

    public function login(array $request){

        $credentials = $request->validate([
            'email' => 'required|email|string|exists:hospitals,email',
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
    


    public function medicines(){
        return $this->hasMany(Medicine::class);
    }

    public function patients(){
        return $this->hasMany(Patient::class);
    }

    public function patient_hospital_medicines(){
        return $this->hasMany(Patient_hospital_medicine::class);
    }


}
