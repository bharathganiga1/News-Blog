<html>
    <head>
        <title>
            NEWS-BLOG
        </title>
        <link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/News-Blog/css/style.css?v=<?php echo time(); ?>">
        <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">NEWS-BLOG</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>">HOME</a></li>
                        <li><a href="<?php echo base_url(); ?>about">ABOUT</a></li>
                        <li><a href="<?php echo base_url(); ?>posts">BLOG</a></li>
                        <li><a href="<?php echo base_url(); ?>categories">CATEGORIES</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url(); ?>posts/create">NEW POST</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>categories/create">NEW CATEGORY</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>users/register">REGISTER</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
        <!-- flass container -->
        <?php if($this->session->flashdata('user_registered')):?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('Post_created')):?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('Post_created').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('Post_deleted')):?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('Post_deleted').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('Post_updated')):?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('Post_updated').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('category_created')):?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>';?>
        <?php endif;?>
        

