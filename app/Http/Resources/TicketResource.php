<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'user_id' => $this->user_id,
            'category_name' =>$this->category_name,
            'title' =>$this->title,
            'description' => $this->description, 
            'status'=> $this->status, 
            'assigned_to'=> $this->assigned_to,
            'priority' => $this->priority,
            'comments' => TicketResource::collection($this->whenLoaded('comments'))
        ];
    }
}
