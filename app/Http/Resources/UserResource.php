<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => 'users',
            'id' => $this->id,
            'name' => $this->when(isset($this->name), $this->name),
            'username' => $this->when(isset($this->username), $this->username),
            'email' => $this->when(isset($this->email), $this->email),
            'address' => $this->when(isset($this->address), $this->address),
            'phone' => $this->when(isset($this->phone), $this->phone),
            'website' => $this->when(isset($this->website), $this->website),
            'company' => $this->when(isset($this->company), $this->company), 
        ];
    }
}
