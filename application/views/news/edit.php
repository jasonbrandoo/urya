<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('news/update'); ?>
<input type="hidden" name="id" value="<?php echo $news_item['id_news']; ?>">
<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $news_item['title']; ?>">
</div>
<div class="form-group">
	<label>Body</label>
	<textarea class="form-control" name="text" placeholder="Add Body" id="editor1"><?php echo $news_item['text']; ?></textarea>
</div>
<div class="form-group">
	<label>Category</label>
	<select name="category_id" class="form-control">
		<?php foreach($categories as $category): ?>
			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
		<?php endforeach; ?>
	</select>
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>