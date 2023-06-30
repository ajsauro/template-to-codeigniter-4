<?php

namespace App\Cells;

use App\Models\Post;

class CategorySidebarPills
{
    public function render(string $view)
    {
        $populars = $this->$view();
        return view("partials/cells/category_sidebar_pills", ['populars' => $populars]);
    }
    public function populars()
    {
        if (!$posts = cache('populars')) {
            $post = new Post();
            $posts = $post->select(
                'posts.id as postsId, posts.title, posts.slug, posts.created_at, 
            categories.name as categoryName, users.firstName as userFirstName, users.lastName as userLastName'
            )->join(
                'users',
                'users.id = posts.user_id'
            )->join(
                'categories',
                'categories.id = posts.category_id'
            )->orderBy('visits', 'desc')->findAll(6);
            cache()->save('populars', $posts, 300);
        }

        return $posts;
    }
    public function latest()
    {
        if (!$posts = cache('latest')) {
            $post = new Post();
            $posts = $post->select(
                'posts.id as postsId, posts.title, posts.slug, posts.created_at, categories.name as categoryName, 
            users.firstName as userFirstName, users.lastName as userLastName'
            )->join(
                'users',
                'users.id = posts.user_id'
            )->join(
                'categories',
                'categories.id = posts.category_id'
            )->orderBy('posts.id', 'desc')->findAll(6);
            cache()->save('latest', $posts, 300);
        }

        return $posts;
    }
}
