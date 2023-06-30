<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category as ModelsCategory;
use App\Models\Post;

class Category extends BaseController
{
    public function index(string $slug)
    {
        $category = new ModelsCategory();
        $category = $category->select('id')->where('slug', $slug)->first();

        $post = new Post();
        $post->select(
            'posts.id as postId, posts.title, posts.image, posts.description, posts.visits, posts.slug, 
            posts.created_at, categories.name as categoryName, users.photo, 
            users.firstName as userFirstName, users.lastName as userLastName'
        )->where('category_id', $category->id)->join(
            'users',
            'users.id = posts.user_id'
        )->join(
            'categories',
            'categories.id = posts.category_id'
        );

        //        $populars = $this->populars(); , 'populars' => $populars

        return view('category', ['posts' => $post->paginate(5), 'pager' => $post->pager]);
    }
}
