<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class HomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'photo_id' => $this->photo_id,
            'description' => $this->description,
            'recipe_id' => $this->recipe_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'likes_count' => $this->likes_count,
            'is_liked' => $this->isLiked(),
            'comments_count' => $this->comments_count,
        ];
    }

    private function isLiked(): bool
    {
        $user = Auth::user();

        return $user ? $this->likes()->where('liker_id', $user->id)->exists() : false;
    }
}
