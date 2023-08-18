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
<hr>
<h3>Comments</h3>
<?php if($comments): ?>
    <?php foreach($comments as $comment):?>
        <div class="well">
            <h5><?php echo $comment['body'];?> [by <strong><?php echo $comment['user_name'];?></strong>] </h5>
        </div>
    <?php endforeach?>
<?php else: ?>
    <p>NO Comments</p>
<?php endif; ?>

<hr>
<h3>Add Comments</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
    <button class="btn btn-primary" type="submit">Submit</button>
</form>