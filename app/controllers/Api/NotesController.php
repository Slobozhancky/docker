<?php

namespace app\controllers\Api;

use app\models\Note;
use app\validators\Notes\CreateNotesValidator;
use app\validators\Notes\UpdateNoteValidator;
use enums\sqlOrder;

class NotesController extends BaseApiController
{
    public function index(): array
    {
        return $this->response(
            body: Note::where('user_id', '=', authId())
                ->orderBy([
                    'pinned' => sqlOrder::DESC,
                    'completed' => sqlOrder::ASC,
                    'updated_at' => sqlOrder::DESC,
                ])
                ->get()
        );
    }

    public function show(int $id): array
    {
        $note = Note::find($id);

        if ($note && $note->user_id !== authId()) {
            return $this->response(403, [], [
                'message' => 'This resource is forbidden for you'
            ]);
        }

        return $this->response(body: $note->toArray());
    }

    public function store(): array
    {
        $data = array_merge(
            requestBody(),
            ['user_id' => authId()]
        );
        $validator = new CreateNotesValidator();

        if ($validator->validate($data) && $note = Note::create($data)) {
            return $this->response(body: $note->toArray());
        }

        return $this->response(errors: $validator->getErrors());
    }

    public function update(int $id)
    {
        $note = Note::find($id);

        if ($note && $note->user_id !== authId()) {
            return $this->response(403, errors: [
                'message' => 'This resource is forbidden for you'
            ]);
        }

        $data = [
            ...requestBody(),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $validator = new UpdateNoteValidator($note);

        if ($validator->validate($data) && $note = $note->update($data)) {
            return $this->response(body: $note->toArray());
        }

        return $this->response(errors: $validator->getErrors());
    }

    public function delete(int $id): array
    {
        $note = Note::find($id);

        if ($note && $note->user_id !== authId()) {
            return $this->response(403, [], [
                'message' => 'This resource is forbidden for you'
            ]);
        }

        $result = Note::delete($id);

        if (!$result) {
            return $this->response(422, [], ['message' => 'Oops smth went wrong']);
        }

        return $this->response();
    }
}

