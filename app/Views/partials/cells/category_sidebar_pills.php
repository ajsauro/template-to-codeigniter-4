<div class="post-entry-1 border-bottom">
    <?php foreach ($populars as $popular) : ?>
        <div class="post-meta"><span class="date"><?= $popular->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y', strtotime($popular->categoryName)) ?></span></div>
        <h2 class="mb-2"><a href="/singlePost?id=<?= $popular->postsId ?>" <?= $popular->title ?>><?= $popular->title ?></a></h2>
        <span class="author mb-3 d-block"><?= $popular->userFirstName ?> <?= $popular->userLastName ?></span>
    <?php endforeach ?>
</div>