<div class="container" data-aos="fade-up">
    <div class="section-header d-flex justify-content-between align-items-center mb-5">
        <h2><?= $posts[0]->categoryName ?></h2>
        <div><a href="category.html" class="more">See All <?= $posts[0]->categoryName ?></a></div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <?php $post = $posts[0]; ?>
            <div class="d-lg-flex post-entry-2">
                <a href="/singlePost?id=<?= $post->postId ?>" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                    <img src="<?= $post->image ?>" alt="" class="img-fluid">
                </a>
                <div>
                    <div class="post-meta"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y H:i:s', strtotime($post->created_at)) ?></span></div>
                    <h3><a href="/singlePost?id=<?= $post->postId ?>"><?= $post->title ?></a></h3>
                    <p><?= word_limiter($post->description, 20) ?></p>
                    <div class="d-flex align-items-center author">
                        <div class="photo"><img src="<?= $post->photo ?>" alt="" class="img-fluid"></div>
                        <div class="name">
                            <h3 class="m-0 p-0"><?= $post->userFirstName ?> <?= $post->userLastName ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <?php $post = $posts[1]; ?>
                    <div class="post-entry-1 border-bottom">
                        <a href="/singlePost?id=<?= $post->postId ?>"><img src="<?= $post->image ?>" alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y H:i:s', strtotime($post->created_at)) ?></span></div>
                        <h2 class="mb-2"><a href="/singlePost?id=<?= $post->postId ?>"><?= $post->title ?></a></h2>
                        <span class="author mb-3 d-block"><?= $post->userFirstName ?> <?= $post->userLastName ?></span>
                        <p class="mb-4 d-block"><?= word_limiter($post->description, 20) ?></p>
                    </div>

                    <?php $post = $posts[2]; ?>
                    <div class="post-entry-1">
                        <div class="post-meta"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y H:i:s', strtotime($post->created_at)) ?></span></div>
                        <h2 class="mb-2"><a href="/singlePost?id=<?= $post->postId ?>"><?= $post->title ?></a></h2>
                        <span class="author mb-3 d-block"><?= $post->userFirstName ?> <?= $post->userLastName ?></span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <?php $post = $posts[3]; ?>
                    <div class="post-entry-1">
                        <a href="/singlePost?id=<?= $post->postId ?>"><img src="<?= $post->image ?>" alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y H:i:s', strtotime($post->created_at)) ?></span></div>
                        <h2 class="mb-2"><a href="/singlePost?id=<?= $post->postId ?>"><?= $post->title ?></a></h2>
                        <span class="author mb-3 d-block"><?= $post->userFirstName ?> <?= $post->userLastName ?></span>
                        <p class="mb-4 d-block"><?= word_limiter($post->description, 50) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <?php $posts = array_slice($posts, 4, 10); ?>
            <?php foreach ($posts as $post) : ?>
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"><?= $post->categoryName ?>"</span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y', strtotime($post->created_at)) ?></span></div>
                    <h2 class="mb-2"><a href="/singlePost?id=<?= $post->postId ?>"><?= $post->title ?></a></h2>
                    <span class="author mb-3 d-block"><?= $post->userFirstName ?> <?= $post->userLastName ?></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>