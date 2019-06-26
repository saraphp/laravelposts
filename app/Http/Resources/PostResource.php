<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'type' => 'posts',
            'id' => $this->id,
            'title' => $this->when(isset($this->title), $this->title),
            'body' => $this->when(isset($this->body), $this->body),
            'user' => $this->when(isset($this->user), @$this->user),

        ];
    }
}
