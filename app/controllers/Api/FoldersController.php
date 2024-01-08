<?php

namespace app\controllers\Api;

use app\models\Folder;
use app\validators\Folders\CreateFoldersValidator;

class FoldersController extends BaseApiController
{
    public function index()
    {
        dd(__METHOD__);
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

        if ($validator->validate($data)){
            $folder = Folder::create($data);
            dd($folder);
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

