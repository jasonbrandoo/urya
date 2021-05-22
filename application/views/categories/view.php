<h2><?php echo $title; ?></h2>
<?php echo $news['text']; ?>
<hr>
<a href="edit/<?php echo $news_item['slug']; ?>" class="btn btn-success">Edit</a>
<?php echo form_open('news/delete/'.$news_item['id']); ?>
<input type="submit" class="btn btn-danger" value="Delete">
</form>