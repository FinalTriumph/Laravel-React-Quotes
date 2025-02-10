<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = Auth::user();

        return [
            'id' => $this->resource->id,
            'text' => $this->resource->text,
            'author' => $this->resource->author,
            'source' => $this->resource->source,
            'userId' => $this->resource->user_id,
            'savedBy' => $this->resource->user->name,
            'savedAt' => $this->resource->created_at->format('d.m.Y H:i'),
            'savedByMe' => $user ? $user->id === $this->resource->user->id : false,
        ];
    }
}
