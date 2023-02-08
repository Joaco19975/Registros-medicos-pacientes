<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone' ,'password'];
    
    public function register(array $data){

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
    }


}
