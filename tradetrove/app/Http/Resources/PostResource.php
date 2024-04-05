<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
//        $post = Post::where(['id' => $request->id]);
//        $workShift = $this->route('workShift');
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'category'=>$this->category->name,
            'user'=>$this->user->first_name." ".$this->user->last_name,
            'address'=>$this->address,
            'price'=>$this->price,
            'condition'=>$this->condition->name,
            'status'=>$this->status->name,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
