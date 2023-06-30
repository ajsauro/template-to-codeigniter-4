<h3 class="footer-heading">Recent Posts</h3>
<ul class="footer-links footer-blog-entry list-unstyled">
    <?php foreach ($posts as $post) : ?>
        <li>
            <a href="/singlePost?id=<?= $post->postsId ?>" class="d-flex align-items-center">
                <img src="<?= $post->image ?>" alt="" class="img-fluid me-3">
                <div>
                    <div class="post-meta d-block"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y', strtotime($post->image)) ?></span></div>
                    <span><?= $post->title ?></span>
                </div>
            </a>
        </li>
    <?php endforeach ?>
</ul>