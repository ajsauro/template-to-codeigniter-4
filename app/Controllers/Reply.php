<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Reply as ModelReply;

class Reply extends BaseController
{
    public function store()
    {
        if ($this->request->isAJAX()) {
            $data = json_decode(file_get_contents('php://input'));
            $replied = (new ModelReply())->insert([
                'comment' => $data->reply,
                'comment_id' => $data->commentId,
                'user_id' => session()->get('user')->id,
            ]);
            if ($replied) {
                return $this->response->setJson(['message' => 'replied'])->setStatusCode(200);
            } else {
                return $this->response->setJson(['message' => 'not replied'])->setStatusCode(400);
            }
        }

        return $this->response->setJson(['message' => 'Is not an AJAX'])->setStatusCode(400);
    }
}
