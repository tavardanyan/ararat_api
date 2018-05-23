<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;

class Category extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'title' => $this->title,
        //     'slug' => $this->slug,
        //     'desc' => $this->desc,
        //     'image' => Storage::url($this->image),
        // ];
    }
}
