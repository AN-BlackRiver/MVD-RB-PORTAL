<?php

namespace App\Http\Resources\Subdivision;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubdivisionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title
        ];
    }
}
