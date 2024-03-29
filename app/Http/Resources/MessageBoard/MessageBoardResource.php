<?php

namespace App\Http\Resources\MessageBoard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageBoardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'slug'       => $this->slug,
            'content'    => $this->content,
            'created_at' => is_object($this->created_at) ? $this->created_at->diffForHumans() : "",
            'updated_at' => is_object($this->updated_at) ? $this->updated_at->diffForHumans() : "",
        ];
        // return parent::toArray($request);
    }
}
