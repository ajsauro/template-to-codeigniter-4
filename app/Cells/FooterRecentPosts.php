<?php

namespace App\Cells;

use App\Models\Post;

class FooterRecentPosts
{
    public function render()
    {
        if (!$posts = cache('footerRecent')) {
            $post = new Post();
            $posts = $post->select(
                'posts.id as postsId, posts.image, posts.title, posts.created_at, categories.name as categoryName'
            )->join(
                'categories',
                'categories.id = posts.category_id'
            )->orderBy(
                'posts.id',
                'desc'
            )->findAll(4);
            cache()->save('footerRecent', $posts, 300);
        }

        return view("partials/cells/FooterRecentPosts", ['posts' => $posts]);
    }
}
