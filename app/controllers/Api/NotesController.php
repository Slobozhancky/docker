<?php

namespace app\controllers\Api;

use app\models\Folder;
use app\validators\Folders\CreateFoldersValidator;
use enums\SQL;
use enums\sqlOrder;

class NotesController extends BaseApiController
{
    public function index()
    {
        return $this->response(
            200,
            Folder::where('user_id', '=', authId())
                ->orWhere('user_id', "IS", SQL::NULL->value)
                ->orderBy([
                    'user_id' => sqlOrder::ASC,
                    'title' => sqlOrder::ASC,
                ])
                ->get()
        );
    }

    public function show(int $id)
    {
        $folder = Folder::find($id);

        if ($folder && !is_null($folder->user_id) && $folder->user_id !== authId()) {
            return $this->response(403, [], [
                'message' => 'Цей ресурс заборонений для тебе'
            ]);
        }

        return $this->response(200, $folder->toArray());
    }

    public function store()
    {
        $data = array_merge(requestBody(), ['user_id' => authId()]);
        $validator = new CreateFoldersValidator();
//        $validator->validate($data);

        if ($validator->validate($data) && $folder = Folder::create($data)) {
            return $this->response(200, $folder->toArray());
        }

        return $this->response(200, [], $validator->getErrors());
    }

//    public function update(int $id)
//    {
//        $folder = Folder::find($id);
//
//        if ($folder && is_null($folder->user_id) && $folder->user_id !== authId()) {
//            return $this->response(403, errors: [
//                'message' => 'Цей ресурс заборонений для тебе'
//            ]);
//        }
//
//        $data = [
//            ...requestBody(),
//            'updated_at' => date('Y-m-d H:i:s')
//        ];
//
//        $validator = new CreateFoldersValidator();
//        if ($validator->validate($data) && $folder = $folder->update($data)) {
//            return $this->response(body: $folder->toArray());
//        }
//
//        return $this->response(errors: $validator->getErrors());
//
//    }
//
//    public function delete(int $id)
//    {
//        $folder = Folder::find($id);
//
//        if ($folder && is_null($folder->user_id) && $folder->user_id !== authId()) {
//            return $this->response(403, [], [
//                'message' => 'Цей ресурс заборонений для тебе'
//            ]);
//        }
//
//        $result = Folder::delete($id);
//
//        if (!$result) {
//            return $this->response(422, [], ["message" => "Вибачте, виникла помилка"]);
//        }
//
//        return $this->response();
//    }
}

