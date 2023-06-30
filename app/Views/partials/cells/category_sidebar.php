        <?php foreach ($categories as $category) : ?>
            <li><a href="/category/<?= $category->slug ?>"><i class="bi bi-chevron-right"></i><?= $category->name ?></a></li>
        <?php endforeach ?>
