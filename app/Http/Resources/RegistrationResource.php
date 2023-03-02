<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


    public function toArray($request)
    {
       return [

        'id' => $this->id,
        'id_hospital' => $this->id_hospital,
        'id_patient' => $this->id_patient,
        'id_medicine' => $this->id_medicine,
        'syntoms' => $this->syntoms,
        'name_patient' => $this->name_patient,
        'name_medicine' => $this->name_medicine,
        'cant_medicine' => $this->cant_medicine,
        'created_at' => $this->created_at,
        'update_at' => $this->update_at

       ];
    }
}
