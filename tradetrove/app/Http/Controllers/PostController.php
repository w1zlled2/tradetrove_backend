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
//        $token = '';
        $secret = env('DADATA_SECRET');
//        $url = env('DADATA_ADDRESSES_URL');
        $url = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address';
        $query = $request->address;
//        $resp = json_encode([
//            'suggestions' => [
//                ['value' => 'г. Асбест, ул. Чайковского, д.14'],
//                ['value' => 'г. Асбест, ул. Чайковского, д.16'],
//                ['value' => 'г. Асбест, ул. Чайковского, д.18']
//            ]]);
//        return dataResponse($resp);
//        $dataArray = json_decode($query, true);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n" .
                    "Authorization: Token $token\r\n" .
                    "X-Secret: $secret\r\n",
                'content' => json_encode(['query' => $query]),
                'ignore_errors' => true // Для игнорирования ошибок HTTP-статусов
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        if (!$response) {
            throw new APIException(500, 'Ошибка при отправке запроса на dadata.ru');
        }
        $resp = json_decode($response, true);
//        dd($resp);
        if (isset($resp['message'])) {
            throw new APIException(500, 'Ошибка dadata.ru: ' . $resp['message']);
        }
        if (isset($resp['suggestions'])) {
            return dataResponse($resp);
        }
//        return json_encode($response);
        // Обработка успешного ответа
//        $dadata = new \Dadata\DadataClient($token, $secret);
//        $result = $dadata->clean("address", $dataArray[0]);
//        dd($result);
//        dd($dataArray[0]);
//        $dadata = DaDataAddress::standardization($dataArray[0]);
//        dd($dadata);
//        return dataResponse();
    }
}
