<h2><?php echo $title; ?></h2>
<small class="post-date">Posted on:<?php echo $post['created_at']; ?></small>
<div class="view-img">
<img src="<?php echo site_url(); ?>images/post-images/<?php echo $post['post_image']?>" style="width: 100px;" >
</div>

<div class="post-body">
    <?php echo $post['body'];  ?>
</div>

<hr>

<a class="btn btn-default pull-left" href="edit/<?php echo $post['slug']; ?>">Edit</a>

<?php echo form_open('/posts/delete/'.$post['id']); ?>
    <input type="submit" value="delete" class="btn btn-danger">
</form>
