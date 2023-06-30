<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;

class Home extends BaseController
{
    public function index()
    {
        return view('home', ['title' => 'Home']);
    }
    public function singlePost()
    {
        $post = new Post();
        $post->select(
            'posts.id as postId, posts.title, posts.description, posts.image, posts.created_at, 
            categories.name as categoryName, 
            users.firstName as userFirstName, users.lastName as userLastName, users.photo'
        )->join(
            'users',
            'users.id = posts.user_id'
        )->join(
            'categories',
            'categories.id = posts.category_id'
        )->where('posts.id', $_GET['id']);

        //        $comments = (new Comment)->comments($_GET['id']);
        $comments = (new Comment)->comments($_GET['id']);

        return view('single_post', ['post' => $post->first(), 'comments' => $comments]);
    }
}
