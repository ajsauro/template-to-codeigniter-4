<?= $this->extend('master') ?>
<?= $this->section('content') ?>
<section class="single-post-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 post-content" data-aos="fade-up">

                <!-- ======= Single Post Content ======= -->
                <div class="single-post">
                    <div class="post-meta"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y h:i:S', strtotime($post->created_at)) ?></span></div>
                    <h1><?= $post->title ?></h1>
                    <div class="d-flex align-items-center author mb-5">
                        <div class="photo"><img src="<?= $post->photo ?>" alt="" class="img-fluid"></div>
                        <div class="name">
                            <h3 class="m-0 p-0"><?= $post->userFirstName ?> <?= $post->userLastName ?></h3>
                        </div>
                    </div>
                    <p><span class="firstcharacter"><?= substr($post->description, 0, 1) ?></span><?= substr($post->description, 1) ?></p>

                    <figure class="my-4">
                        <img src="<?= $post->image ?>" alt="" class="img-fluid">
                        <figcaption>Image do post</figcaption>
                    </figure>
                </div><!-- End Single Post Content -->

                <!-- ======= Comments ======= -->
                <?php if (isset($comments->comments)) : ?>
                    <div class="comments">
                        <h5 class="comment-title py-4"><?php echo count($comments->comments) ?> Comments</h5>
                        <?php foreach ($comments->comments as $comment) : ?>
                            <div class="comment d-flex mb-4">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm rounded-circle">
                                        <img class="avatar-img" src="<?= $comment->avatar ?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                    <div class="comment-meta d-flex align-items-baseline">
                                        <h6 class="me-2"><?= $comment->userFirstName ?> <?= $comment->userLastName ?></h6>
                                        <span class="text-muted">
                                            <?php echo CodeIgniter\I18n\Time::parse($comment->created_at)->humanize(); ?>
                                            <?php if (!$comment->isAuthor && session()->has('auth')) : ?>
                                                <button type="button" class="btn btn-outline-primary btn-sm btn-reply" data-id="<?php echo $comment->id; ?>">Reply to <?= $comment->userFirstName ?> <i class="bi bi-send"></i></button>
                                            <?php endif; ?>
                                            <?php if ($comment->isAuthor) : ?>
                                                <span class="badge bg-dark">My comment <i class="bi bi-star-fill"></i></span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <?= $comment->userMail ?>
                                    <div class="comment-body">
                                        <?= nl2br($comment->comment) ?>
                                    </div>

                                    <?php if (isset($comment->replies)) : ?>
                                        <div class="comment-replies bg-light p-3 mt-3 rounded">
                                            <h6 class="comment-replies-title mb-4 text-muted text-uppercase"><?php echo count($comment->replies) ?> replies</h6>

                                            <?php $replies = $comment->replies ?>
                                            <?php foreach ($replies as $reply) : ?>
                                                <!-- ?= dd($reply) ? -->
                                                <div class="reply d-flex mb-4">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar avatar-sm rounded-circle">
                                                            <img class="avatar-img" src="<?= $reply->avatar ?>" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                                        <div class="reply-meta d-flex align-items-baseline">
                                                            <h6 class="mb-0 me-2"><?= $reply->userFirstName ?> <?= $reply->userLastName ?></h6>
                                                            <span class="text-muted">
                                                                <?php echo CodeIgniter\I18n\Time::parse($reply->created_at)->humanize(); ?>
                                                                <?php if (!$reply->isAuthor && session()->has('auth')) : ?>
                                                                    <button type="button" class="btn btn-outline-primary btn-sm btn-reply" data-id="<?php echo $comment->id; ?>">Reply to <?= $reply->userFirstName ?> <i class="bi bi-send"></i></button>
                                                                <?php endif; ?>
                                                                <?php if ($reply->isAuthor) : ?>
                                                                    <span class=" badge bg-dark">My reply <i class="bi bi-star-fill"></i></span>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                        <div class="reply-body">
                                                            <?= nl2br($reply->comment); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div><!-- End Comments -->
                <?php endif ?>

                <!-- Modal -->
                <?php echo $this->include('/partials/modals/replies.php') ?>

                <!-- ======= Comments Form ======= -->
                <div class="row justify-content-center mt-5">
                    <?php if (session()->has('messageThrottler')) : ?>
                        <span style="color:red;font-size:30px"><?= session()->getFlashdata('messageThrottler'); ?></span>
                    <?php endif; ?>
                    <div class="col-lg-12">
                        <h5 class="comment-title mb-3">Leave a Comment</h5>
                        <?php if (session()->has('auth')) : ?>
                            <form action="<?= url_to('comment.store'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <input type="hidden" name="post_id" value="<?= $post->postId ?>">
                                    <?php if (session()->has('errors')) : ?>
                                        <span style="color:red;font-size:30px"><?= session()->getFlashdata('errors')['comment']; ?></span>
                                    <?php endif; ?>
                                    <?php if (session()->has('not_creted')) : ?>
                                        <span style="color:red;font-size:30px"><?= session()->getFlashdata('not_creted'); ?></span>
                                    <?php endif; ?>
                                    <?php if (session()->has('creted')) : ?>
                                        <span style="font-size:30px" class="bg-success"><?= session()->getFlashdata('creted'); ?></span>
                                    <?php endif; ?>
                                    <div class="col-12 mb-3">
                                        <label for="comment-message">Message</label>

                                        <textarea class="form-control" name="comment" id="comment-message" placeholder="Enter your comment." cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="Post comment">
                                    </div>
                                </div>
                            </form>
                        <?php else : ?>
                            <span class="alert alert-danger">Você presica estar logado para comentar | <a href="/login">Login</a></span>
                        <?php endif; ?>
                    </div>
                </div><!-- End Comments Form -->

            </div>
            <div class="col-md-3">
                <!-- ======= Sidebar ======= -->
                <?= view_cell('\App\Cells\CategorySidebar::render') ?>
            </div>
        </div>
    </div>
</section>
<?= $this->section('SpecificJS') ?>
<script src="/assets/js/replies.js"></script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>