<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'id' => $this->id,
            'Name' => $this->name,
            'Email' => $this->email,
            'Admin' => $this->is_admin == 1 ? true : false,
            'Created' => $this->created_at->toDateString(),
        ];
    }
}
