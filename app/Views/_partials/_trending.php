<h3>Trending</h3>
<ul class="trending-post">
    <?php foreach ($trendings as $index => $trending) : ?>
        <li>
            <a href="/singlePost?id=<?= $trending->postId ?>">
                <span class="number"><?= $index + 1 ?></span>
                <h3><?= $trending->title ?></h3>
                <span class="author">
                    <?= $trending->userFirstName ?> <?= $trending->userLastName ?>
                </span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>