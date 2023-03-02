<?php

namespace App\Http\Requests;

use App\Models\Medicine;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateMedicineRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required|string|max:1000',
            'type' => 'required|string|max:1000',
            'id_hospital' => 'exists:users,id',
            'stock' => 'required',
            'expiration' => 'date|required',
        ];
    }

}