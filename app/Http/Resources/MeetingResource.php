<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'start' => $this->start_date,
            'end' => $this->end_date,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'participants' => ParticipantResource::collection($this->whenLoaded('participants'))
        ];
    }
}
