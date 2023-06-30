  <div class="container" data-aos="fade-up">
    <div class="row g-5">
      <div class="col-lg-4">
        <?php $post = $recent[0]; ?>
        <div class="post-entry-1 lg">
          <?php $post->image = 'https://picsum.photos/id/' . rand(1, 200) . '/640/480' ?>
          <a href="/singlePost?id=<?= $post->postId ?>"><img src="<?= $post->image ?>" alt="" class="img-fluid"></a>
          <div class="post-meta"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y', strtotime($post->created_at)) ?></span></div>
          <h2><a href="/singlePost?id=<?= $post->postId ?>"><?= $post->title ?></a></h2>
          <p class="mb-4 d-block"><?= word_limiter($post->description, 20) ?></p>

          <div class="d-flex align-items-center author">
            <div class="photo"><img src="<?= $post->photo ?>" alt="" class="img-fluid"></div>
            <div class="name">
              <h3 class="m-0 p-0"><?= $post->userFirstName ?> <?= $post->userLastName ?></h3>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-8">
        <div class="row g-5">
          <div class="col-lg-4 border-start custom-border">
            <?php $posts = array_slice($recent, 1, 3); ?>
            <?php foreach ($posts as $post) : ?>
              <?php $post->image = 'https://picsum.photos/id/' . rand(201, 400) . '/640/480' ?>
              <div class="post-entry-1">
                <a href="/singlePost?id=<?= $post->postId ?>"><img src="<?= $post->image ?>" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y H:i:s', strtotime($post->created_at)) ?></span></div>
                <h2><a href="/singlePost?id=<?= $post->postId ?>"><?= $post->title ?></a></h2>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="col-lg-4 border-start custom-border">
            <?php $posts = array_slice($recent, 4, 6); ?>
            <?php foreach ($posts as $post) : ?>
              <?php $post->image = 'https://picsum.photos/id/' . rand(401, 600) . '/640/480' ?>
              <div class="post-entry-1">
                <a href="/singlePost?id=<?= $post->postId ?>"><img src="<?= $post->image ?>" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date"><?= $post->categoryName ?></span> <span class="mx-1">&bullet;</span> <span><?= date('d/m/Y H:i:s', strtotime($post->created_at)) ?></span></div>
                <h2><a href="/singlePost?id=<?= $post->postId ?>"><?= $post->title ?></a></h2>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Trending Section -->
          <div class="col-lg-4">
            <div class="trending _trending">

            </div>
          </div> <!-- End Trending Section -->
        </div>
      </div>

    </div> <!-- End .row -->
  </div>