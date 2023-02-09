<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\PartyResultResource;
use App\Http\Resources\PartyResource;

class ResultResource extends JsonResource
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
            "id" => $this->id,
            "state_id" => $this->state?->id,
            "state" => $this->state?->name,
            "registered" => $this->registered,
            "accreditated" => $this->accreditated,
            "invalid" => $this->invalid,
            "valid" => $this->valid,
            "result" => PartyResultResource::collection($this->partyResults),
            "winner" => new PartyResource($this->party)
        ];
    }
}
