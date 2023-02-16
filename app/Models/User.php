<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Patient_hospital_medicine;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];
 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
  
     public function misDatos(){
        return Auth::user();
     }

     public function medicines(){
        return $this->hasMany(Medicine::class, 'id_hospital');
     }

    public function patients(){
        return $this->hasMany(Patient::class, 'id_hospital');
    }

    public function patient_hospital_medicines(){
        return $this->hasMany(Patient_hospital_medicine::class);
    }

}
