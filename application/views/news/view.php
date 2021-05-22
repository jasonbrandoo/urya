<h5>Original Posted by <a href="<?php echo site_url('users/profile/'.$news_item['username']); ?>"><?php echo $news_item['username']; ?></a></h5>
<h2><?php echo $title; ?></h2>
<small class="posted-on">Posted on :<?php echo $news_item['created_at']; ?></small><br>
<img class="post-thumbnail" src="<?php echo site_url(); ?>assets/img/<?php echo $news_item['post_image']; ?>"><br><br>
<?php echo $news_item['text']; ?><br><br>

<?php if($this->session->userdata('user_id') == $news_item['user_id']): ?>
	<hr>
	<a href="<?php echo site_url('edit/'.$news_item['slug']) ; ?>" class="btn btn-success">Edit</a><br><br>
	<?php echo form_open('news/delete/'.$news_item['id_news']); ?>
	<input type="submit" class="btn btn-danger" value="Delete">
</form>
<hr>
<?php endif; ?>
<h3>Comments</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment): ?>
		<div class="comment">
			<p><?php echo $comment['body']; ?>[Orignal posted by <a href="<?php echo site_url('users/profile/'.$comment['username']); ?>"><strong><?php echo $comment['username']; ?></strong></a>] <small class="text-right"><?php echo $comment['created_at']; ?></small></p>
		</div><hr>
	<?php endforeach; ?>
<?php else: ?>
	<p>No Comments to display</p>
<?php endif; ?>
<hr>
<h3>Add Comment</h3>
<?php if($this->session->userdata('log_in')): ?>
	<?php echo validation_errors(); ?>
	<?php echo form_open('comment/create/'.$news_item['id_news']); ?>
		<input type="hidden" name="name" class="form-control" value="<?php echo $this->session->userdata('username'); ?>">
	<!-- <div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" required>
	</div> -->
	<div class="form-group">
		<label>Body</label>
		<textarea name="text" class="form-control" id="editor1"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $news_item['slug']; ?>">
	<button class="btn btn-primary" type="submit">Submit</button>
</form>
<?php endif; ?>
<?php if(!$this->session->userdata('log_in')): ?>
	<p>Please login to comment</p>
<?php endif; ?>
