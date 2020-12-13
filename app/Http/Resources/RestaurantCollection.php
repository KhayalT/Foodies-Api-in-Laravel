<?php

namespace App\Http\Resources;

use App\Models\Restaurant_Tag;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Restaurant' => $this->restaurant_name,
            'Image' => $this->image,
            'Category' => $this->category->name,
            'Tags' => $this->tags->count() > 0 ? $this->tags->pluck('name') : 'Tag Not found!',
            'price' => $this->price <= 30 ? '$' : ($this->price <=  60 ? '$$' : '$$$'),
            'Average Delivery' => $this->delivery_time,
            'Comments' => $this->review->count(),
            'star' => $this->review->count() > 0 ? round(($this->review->sum('star') / $this->review->count()), 2) :
                'No already review',
            'links' => [
                'Reviews' => $this->review->count() > 0 ? route('review.index', $this->id) : 'No Review',
            ],
        ];
    }
}
