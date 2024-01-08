<?php

namespace app\controllers\Api;

use app\models\Folder;
use app\validators\Folders\CreateFoldersValidator;
use enums\SQL;
use enums\sqlOrder;

class FoldersController extends BaseApiController
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
        dd(__METHOD__, $id);
    }

    public function store()
    {
        $data = array_merge(requestBody(), ['user_id' => authId()]);
        $validator = new CreateFoldersValidator();
        $validator->validate($data);

        if ($validator->validate($data) && $folder = Folder::create($data)) {
            return $this->response(200, $folder->toArray());
        }

        return $this->response(200, [], $validator->getErrors());
    }

    public function update(int $id)
    {
        dd(__METHOD__, $id);
    }

    public function delete(int $id)
    {
        dd(__METHOD__, $id);
    }
}

