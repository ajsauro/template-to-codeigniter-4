<?php

namespace App\Models;

use CodeIgniter\Model;

class Reply extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'replies';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'user_id', 'comment_id', 'comment'];

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
    public function replies(array $commentIds)
    {
        $replies = $this->select(
            'replies.id, replies.comment, replies.comment_id, replies.created_at, users.email as userMail, users.id as userId, users.firstName as userFirstName, users.lastName as userLastName, users.photo as avatar'
        )->join(
            'users',
            'users.id = replies.user_id'
        )->whereIn(
            'replies.comment_id',
            $commentIds
        )->findAll();

        return $replies;
    }
}
