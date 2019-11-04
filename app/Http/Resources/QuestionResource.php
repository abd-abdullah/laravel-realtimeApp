<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'title' => $this->title,
            'path' => $this->path,
            'replies' => ReplyResource::collection($this->replies),
            'reply_count' => $this->replies->count(),
            'id' => $this->id,
            'body' => $this->body,
            'user' => $this->user->name,
            'user_id' => $this->user->id,
            'created' => $this->created_at->diffForHumans(),
        ];
    }
}
