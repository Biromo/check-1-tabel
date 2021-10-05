<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
//            'user_id'=>$this->user_id,
            'name'=>$this->name,
            'price'=>number_format($this->price / 100, 2),
            'main_picture'=>$this->main_picture,
            'description'=>$this->description,
            'images'=>$this->images
        ];
    }
}
