<?php

namespace app\controllers\Api;

use app\models\Folder;
use app\models\Note;
use app\models\SharedNote;
use app\validators\Folders\CreateFoldersValidator;
use enums\Folders;
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
        $folder = Folder::find($id);

        if ($folder && !is_null($folder->user_id) && $folder->user_id !== authId()) {
            return $this->response(403, [], [
                'message' => 'Цей ресурс заборонений для тебе'
            ]);
        }

        return $this->response(200, $folder->toArray());
    }

    public function notes(int $id)
    {
        $folder = Folder::find($id);

        $notes = match ($folder->title) {
            Folders::GENERAL->value => Note::where('folder_id', '=', $id)->andWhere('user_id', '=', authId())->get(),
            Folders::SHARED->value => Note::select(['notes.*'])
                ->join(
                    SharedNote::$tableName,
                    [
                        [
                            'left' => 'notes.id',
                            'operator' => '=',
                            'right' => SharedNote::$tableName . '.note_id'
                        ],
                        [
                            'left' => authId(),
                            'operator' => '=',
                            'right' => SharedNote::$tableName . '.user_id'
                        ]
                    ],
                    'RIGHT'
                )->get(),
            default => Note::where('folder_id', '=', $id),
        };

        return $this->response(body: $notes);
    }

    public function store(): array
    {
        $data = array_merge(requestBody(), ['user_id' => authId()]);
        $validator = new CreateFoldersValidator();
//        $validator->validate($data);

        if ($validator->validate($data) && $folder = Folder::create($data)) {
            return $this->response(200, $folder->toArray());
        }

        return $this->response(200, [], $validator->getErrors());
    }

    public function update(int $id)
    {
        $folder = Folder::find($id);

        if ($folder && is_null($folder->user_id) && $folder->user_id !== authId()) {
            return $this->response(403, errors: [
                'message' => 'Цей ресурс заборонений для тебе'
            ]);
        }

        $data = [
            ...requestBody(),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $validator = new CreateFoldersValidator();
        if ($validator->validate($data) && $folder = $folder->update($data)) {
            return $this->response(body: $folder->toArray());
        }

        return $this->response(errors: $validator->getErrors());

    }

    public function delete(int $id): array
    {
        $folder = Folder::find($id);

        if ($folder && is_null($folder->user_id) && $folder->user_id !== authId()) {
            return $this->response(403, [], [
                'message' => 'Цей ресурс заборонений для тебе'
            ]);
        }

        $result = Folder::delete($id);

        if (!$result) {
            return $this->response(422, [], ["message" => "Вибачте, виникла помилка"]);
        }

        return $this->response();
    }
}


