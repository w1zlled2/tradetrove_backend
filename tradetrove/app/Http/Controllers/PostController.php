<?php

namespace App\Http\Controllers;

require_once __DIR__ . '../../../functions.php';

use App\Exceptions\APIException;
use App\Http\Requests\PostAddRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use MoveMoveIo\DaData\DaDataAddress;
//use MoveMoveIo\DaData\Facades\DaDataAddress;

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

    public function dadataValidate(Request $request)
    {
        $token = env('DADATA_TOKEN');
        $secret = env('DADATA_SECRET');
        $url = env('DADATA_ADDRESSES_URL');
        $query = $request->getContent();
        $dataArray = json_decode($query, true);
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => "Content-Type: application/json\r\n" .
                    "Authorization: Token $token\r\n" .
                    "X-Secret: $secret\r\n",
                'content' => $query,
                'ignore_errors' => true // Для игнорирования ошибок HTTP-статусов
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response === false) {
            // Обработка ошибки
            throw new APIException(444, 'Error in sending request');
        } else {
            // Обработка успешного ответа
            return dataResponse($response);
        }
//        $dadata = new \Dadata\DadataClient($token, $secret);
//        $result = $dadata->clean("address", $dataArray[0]);
//        dd($result);
//        dd($dataArray[0]);
//        $dadata = DaDataAddress::standardization($dataArray[0]);
//        dd($dadata);
//        return dataResponse();
    }
}
