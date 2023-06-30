<?php

namespace App\Models;

use CodeIgniter\Model;
use stdClass;

class Comment extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function comments(int $postId)
    {
        $comments = $this->select(
            'comments.id, comments.comment, comments.created_at, users.email as userMail, users.id as userId, users.firstName as userFirstName, users.lastName as userLastName, users.photo as avatar'
        )->join(
            'users',
            'users.id = comments.user_id'
        )->where(
            'post_id',
            $postId
        )->findAll();

        if (!$comments) {
            return [];
        }

        $commentIds = [];
        foreach ($comments as $comment) {
            $commentIds[] = $comment->id;
        }

        $replies = (new Reply)->replies($commentIds);

        $commentsData = new stdClass;
        foreach ($comments as $index => $comment) {
            $commentsData->comments[] = $comment;
            $commentsData->comments[$index]->isAuthor = !session()->has('auth') ? false : (session()->get('user')->id === $comment->userId);
            foreach ($replies as $indexReply => $reply) {
                if ($comment->id == $reply->comment_id) {
                    $commentsData->comments[$index]->replies[$indexReply] = $reply;
                    $commentsData->comments[$index]->replies[$indexReply]->isAuthor = !session()->has('auth') ? false : (session()->get('user')->id === $reply->userId);
                }
            }
        }

        //        dd($commentsData);
        return $commentsData;
    }
}
