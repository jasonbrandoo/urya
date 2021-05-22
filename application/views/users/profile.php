<div class="row">
	<div class="col-sm-3">
		<h2><?php echo $user['username']; ?></h2>
		<img class="post-thumbnail" src="<?php echo site_url('assets/img/'.$user['profile_picture']); ?>">
		<?php if($this->session->userdata('username') == $user['username']): ?>
			<?php echo form_open_multipart('users/upload'); ?>
			<div class="form-group">
				<label>Upload Image</label>
				<input type="file" name="userfile" size="20" required>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<?php echo form_close(); ?>
		<?php endif; ?>
	</div>
	<div class="col-sm-3"><br><br>
		<h3>About you</h3>
		<p>Name</p>
		<p>Email</p>
		<p>Phone number</p>
		<p>Join date</p>
		<p>Total post</p>
		<p>Location</p>
		<p>Facebook</p>
		<p>Twitter</p>
	</div>
	<div class="col-sm-6"><br><br>
		<h3>Information</h3>
		<p><?php echo $user['name']; ?></p>
		<p><?php echo $user['email']; ?></p>
		<p><?php echo $user['phone']; ?></p>
		<p><?php echo $user['location']; ?></p>
		<p><a href="https://www.facebook.com/<?php echo $user['facebook']; ?>"><?php echo $user['facebook']; ?></a></p>
		<p><a href="https://www.twitter.com/<?php echo $user['twitter']; ?>"><?php echo $user['twitter']; ?></a></p>
		<p><?php echo $user['register_date']; ?></p>
		<p><?php echo $user['total_post']; ?></p>
	</div>
	<?php if($this->session->userdata('username') == $user['username']): ?>
		<a class="btn btn-primary" href="<?php echo site_url('users/edit/'.$user['username']); ?>">Update</a>
	<?php endif; ?>
</div>

<h3>Messages</h3>

<?php if($get_messages) : ?>
	<?php foreach($get_messages as $message): ?>
		<div class="comment">
			<p><?php echo $message['body']; ?>[by <a href="<?php echo $message['sender_id']; ?>"><strong><?php echo $message['sender_id']; ?></strong></a> <small><?php echo $message['created_at']; ?></small>]</p>
		</div><hr>
	<?php endforeach; ?>
<?php else: ?>
	<p>No Messages to display</p>
<?php endif; ?>

<?php if($this->session->userdata('username') != $user['username']): ?>
	<?php echo validation_errors(); ?>
	<?php echo form_open('users/messages/'.$user['username']); ?>
	<div class="form-group">
		<label>Body</label>
		<textarea name="text" class="form-control" id="editor1"></textarea>
	</div>
	<input type="hidden" name="sender" value="<?php echo $this->session->userdata('username'); ?>">
	<button class="btn btn-primary" type="submit">Submit</button>
</form>
<?php endif; ?>

