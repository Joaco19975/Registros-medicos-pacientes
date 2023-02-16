<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
   /* 
Textos completos
id	
id_hospital	
name	
type	
stock	
expiration	
created_at	
updated_at
*/
    public function toArray($request)
    {
       return [
        'id' => $this->id,
        'name' => $this->name,
        'type' => $this->type,
        'stock' => $this->stock,
        'expiration' => $this->expiration,
        'created_at' => $this->created_at,
        'update_at' => $this->update_at

       ];
    }
}
