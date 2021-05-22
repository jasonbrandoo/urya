<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create'); ?>
	<div class="form-group">
		<label>Create Category</label>
		<input type="text" name="name" class="form-control" placeholder="Add Category">
	</div>
	<button class="btn btn-default">Submit</button>
</form>