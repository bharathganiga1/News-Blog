<h1><?php echo $title; ?></h1>


<ul class="list-group">
    <?php foreach($categories as $category):?>
        <li class="list-group-item">
            <a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>">
                <?php echo $category['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

