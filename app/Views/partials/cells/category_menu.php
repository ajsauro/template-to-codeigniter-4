<ul>
    <?php foreach ($categories as $category) : ?>
        <li><a href="/category/<?= $category->slug ?>"><?= $category->name ?></a></li>
    <?php endforeach ?>
</ul>