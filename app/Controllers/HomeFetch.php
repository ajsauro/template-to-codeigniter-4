<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class HomeFetch extends BaseController
{
    public function banner()
    {
        return view('_partials/_bannerHome');
    }
    public function recent()
    {
        $post = new Post();
        $recent = $post->select(
            'posts.id as postId, posts.title, posts.image, posts.created_at, posts.description, 
            categories.name as categoryName, users.firstName as userFirstName, users.lastName 
            as userLastName, users.photo'
        )->join(
            'users',
            'users.id = posts.user_id'
        )->join(
            'categories',
            'categories.id = posts.category_id'
        )->orderBy('posts.id', 'desc')->findAll(7);

        return view('_partials/_recent', [
            'recent' => $recent
        ]);
    }
    public function trending()
    {
        $post = new Post();
        $trendings = $post->select(
            'posts.id as postId, posts.title, users.firstName as userFirstName, users.lastName 
            as userLastName'
        )->join(
            'users',
            'users.id = posts.user_id'
        )->orderBy('visits', 'desc')->findAll(5);

        return view('_partials/_trending', [
            'trendings' => $trendings
        ]);
    }
}
