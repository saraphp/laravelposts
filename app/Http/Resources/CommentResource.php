<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'type' => 'comments',
            'id' => $this->id,
            'name' => $this->when(isset($this->name), $this->name),
            'email' => $this->when(isset($this->email), $this->email),
            'body' => $this->when(isset($this->body), $this->body),
            'post' => $this->when(isset($this->post), $this->post),

        ];
    }
}
