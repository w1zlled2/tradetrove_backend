<?php

namespace App\Http\Controllers;

require_once __DIR__ . '../../../functions.php';

use App\Exceptions\APIException;
use App\Http\Requests\PostAddRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Condition;
use App\Models\ConnectType;
use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PostAddRequest $request)
    {
        $user = Auth::user();

        $conditionId = null;
        $price = null;
        if ($request->price) {
            $price = $request->price;
        } else {
            $price = 0;
        }
        if ($request->condition) {
            $conditionId = Condition::where('code', $request->condition)->first()->id;
        }
        $connectTypeId = null;
        if ($request->connect_type) {
//            dd($request->all());
            $connectTypeId = ConnectType::where('code', $request->connect_type)->first()->id;
//            dd($connectTypeId);
        }

        $needPhoneConnectTypes = ['calls', 'calls_messages'];
        $needPhone = false;
        if ($request->connect_type && in_array($request->connect_type, $needPhoneConnectTypes)) {
            $needPhone = true;
        }
        if ($needPhone && !$request->phone) {
            throw new APIException(422, 'Validation error', ['phone' => ['Номер телефона обязателен при текущем способе связи']]);
        }
        $phone = null;
        if ($needPhone) {
            if ($request->phone) {
                $phone = $request->phone;

            } else {
                throw new APIException(422, 'Validation error', ['phone' => ['Номер телефона обязателен при текущем способе связи']]);
            }
        }
        $status_id = 2;
        if ($request->status_id) {
            $status_id = intval($request->status_id);
        }
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => intval($request->category_id) ?: $request->category_id,
            'user_id' => $user->id,
            'address' => $request->address,
            'price' => $price,
            'condition_id' => $conditionId,
            'status_id' => $status_id,
            'connect_type_id' => $connectTypeId,
            'phone' => $phone
        ]);

        $files = $request->file('files');
        $accessesExtensions = ['jfif', 'jpeg', 'jpg', 'png'];
        $maxFileSize = 20 * 1024 * 1024; // bytes
        $fileLoadResponse = [];
        if ($files) {
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $fileSize = $file->getSize();
                if (!in_array(strtolower($fileExtension), $accessesExtensions)) {
                    $fileLoadResponse[] = [
                        'success' => false,
                        'message' => 'File not loaded. Only jpeg, jpg, png and jfif files are allowed',
                        'name' => $fileName
                    ];
                    continue;
                }
                if ($fileSize > $maxFileSize) {
                    $fileLoadResponse[] = [
                        'success' => false,
                        'message' => 'File not loaded. The maximum file size is 20 MB',
                        'name' => $fileName
                    ];
                    continue;
                }
                $fileId = Str::random(30);
                $path = $file->storeAs('uploads', "$fileId.$fileExtension");
                if (!$path) {
                    $fileLoadResponse[] = [
                        'success' => false,
                        'message' => 'File not loaded. Server upload error',
                        'name' => $fileName
                    ];
                    continue;
                }
                $url = asset($path);
//            $url = asset($file->storeAs('uploads', "$fileId.$fileExtension"));
//            $host = $_SERVER['HTTP_HOST'];
                try {
                    File::create([
                        'post_id' => $post->id,
                        'user_id' => $user->id,
                        'file_id' => $fileId,
                        'extension' => $fileExtension,
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    $fileLoadResponse[] = [
                        'success' => false,
                        'message' => 'File not loaded. Database error',
                        'name' => $fileName
                    ];
                    dd($e);
                    continue;
                }

                $fileLoadResponse[] = [
                    'success' => true,
                    'message' => 'Success',
                    'name' => $fileName,
                    'file_id' => $fileId,
                    'extension' => $fileExtension,
                ];
            }
        }


        $postArray = $post->toArray();
        return dataResponse($postArray + ['files' => $fileLoadResponse]);
//        return $request->file('files')[0];
//        return dataResponse(['files' => $request->file('files')]);
//        return dataResponse($request->all());
//        return new PostResource(Post::create($request->all() + ['status_id' => 2, 'user_id' => Auth::user()->id]));
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
        throw new APIException(500, 'Неизвестная ошибка dadata.ru: ' . $response);
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
