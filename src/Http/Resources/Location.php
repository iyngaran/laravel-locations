<?php


namespace Iyngaran\Location\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Location extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'locations',
                'location_id' => $this->id,
                'attributes' => [
                    'id' => $this->id,
                    'name' => $this->name,
                    'description' => $this->description,
                    'iso_code' => $this->iso_code,
                    'alpha_2_code' => $this->alpha_2_code,
                    'alpha_3_code' => $this->alpha_3_code,
                    'numeric_code' => $this->numeric_code,
                    'calling_code' => $this->calling_code,
                    'currency_name' => $this->currency_name,
                    'currency_signs' => $this->currency_signs,
                    'currency_code' => $this->currency_code,
                    'flag' => $this->flag,
                    'parent_id' => $this->parent_id,
                    'status' => $this->status,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                ]
            ]
        ];
    }
}