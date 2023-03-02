<?php
namespace App\Http\Requests;

use App\Models\Patient_hospital_medicine;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id_hospital' => $this->user()->id
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_hospital' => 'exists:users,id',
            'id_patient' => 'exists:patients,id',
            'id_medicine' => 'exists:medicines,id',
            'syntoms' => 'required|string',
            'name_patient' => 'required',
            'name_medicine' => 'required',
            'cant_medicine' => 'required'
           
        ];
    }

}