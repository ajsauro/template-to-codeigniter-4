<?= $this->extend('master') ?>
<?= $this->section('content') ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9" data-aos="fade-up">
                <h3 class="category-title">Category: <?= $posts[0]->categoryName ?></h3>
                <?php foreach ($posts as $post) : ?>
                    <div class="d-md-flex post-entry-2 half">
                        <a href="single-post.html" class="me-4 thumbnail">
                            <img src="<?= $post->image ?>" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y H:i:s', strtotime($post->created_at)) ?></span></div>
                            <h3><a href="single-post.html"><?= $post->title ?></a></h3>
                            <p><?= word_limiter($post->description, 20) ?></p>
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="<?= $post->photo ?>" alt="" class="img-fluid"></div>
                                <div class="name">
                                    <h3 class="m-0 p-0"><?= $post->userFirstName ?> <?= $post->userLastName ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <div class="text-start py-4">
                    <div class="custom-pagination">
                        <?= $pager->links() ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <!-- ======= Sidebar ======= -->
                <?= view_cell('\App\Cells\CategorySidebar::render') ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>