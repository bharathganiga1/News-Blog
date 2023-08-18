
<h1><?= $title ?></h1>

<?php foreach($posts as $post): ?>
    <div class="post-container">
        <div class="row">
            <div class="col-md-3">
                <?php if ($post['post_image']): ?>
                    <img src="<?php echo site_url('images/post-images/' . $post['post_image']); ?>" alt="" class="img-fluid" style="max-width: 100%;">
                <?php else: ?>
                    <img src="<?php echo site_url('images/noimage.jpg'); ?>" alt="No Image" class="img-fluid" style="max-width: 100%;">
                <?php endif; ?>
            </div>
            <div class="col-md-9">
                <h3><?php echo $post['title']; ?></h3>
                <small class="post-date">Posted on: <?php echo date('F j, Y', strtotime($post['created_at'])); ?> in <strong><?php echo $title; ?></strong></small>
                <p><?php echo word_limiter($post['body'], 50); ?></p>
                <br>
                <p><a class="btn btn-default" href="<?php echo site_url('posts/' . $post['slug']); ?>">Read More</a></p>
            </div>     
        </div>
    </div>
<?php endforeach; ?>




