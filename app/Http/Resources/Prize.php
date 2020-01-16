<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Prize extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->pivot->id,
            'name'=>$this->name,
            'image'=>$this->image,
            'status'=>$this->pivot->status,
        ];
    }
}
