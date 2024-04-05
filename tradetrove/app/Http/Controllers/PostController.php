<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostAddRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * @return PostCollection
     */
    public function index()
    {
        return new PostCollection(Post::all());
    }

    public function userPosts()
    {
        $user = Auth::user();
        if ($user->hasRole(['admin'])) {
            return new PostCollection(Post::all());
        } else {
            return new PostCollection(Post::where(['user_id' => $user->id])->get());

        }
    }

    /**
     * @param PostAddRequest $request
     * @return PostResource
     */
    public function store(PostAddRequest $request)
    {
        return new PostResource(Post::create($request->all() + ['status_id' => 2, 'user_id' => Auth::user()->id]));
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function update(Request $request, Post $post)
    {
        return "Изменение объявления";
    }

    public function destroy(Post $post)
    {
        return "Удаление объявления";
    }

    public function moderate(Request $request, Post $post)
    {
        return "Модерация объявления";
    }
}
