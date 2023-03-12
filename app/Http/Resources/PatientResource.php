<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
        'fullname' => $this->fullname,
        'sex' => $this->sex,
        'dni' => $this->dni,
        'birth_date' => $this->birth_date,
        'created_at' => $this->created_at,
        'update_at' => $this->update_at

       ];
    }
}
