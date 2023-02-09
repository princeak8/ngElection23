<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\PartyResource;

use App\Helpers;

class PresidentialResultResource extends JsonResource
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
            "party" => new PartyResource($this->party),
            "candidate" => $this->candidate,
            "candidate_photo" => $this->candidate_photo,
            "votes" => $this->votes,
            "states" => Helpers::getStatesWith25Percent($this->party->id)
        ];
    }
}
