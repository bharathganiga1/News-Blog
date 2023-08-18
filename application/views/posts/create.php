<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
  <!-- for title -->
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>

  <!-- for text body -->
  <div class="form-group">
    <label >Body</label>
    <textarea id='editor' class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>

  <!-- for drop-down menu -->
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach ?>
    </select>
  </div>

  <!-- for upload image -->
  <div class="form-group">
    <label>upload</label>
    <input type="file" name="userfile" size="20">
  </div>


  <!-- for submit button  -->
  <button type="submit" class="btn btn-default">Submit</button>
</form> 