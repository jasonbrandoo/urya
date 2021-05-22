<?php echo validation_errors(); ?>

<?php echo form_open('users/update'); ?>
<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
<div class="form-group">
	<label>Name</label>
	<input type="text" class="form-control" name="name" placeholder="Update your name" value="<?php echo $user['name'] ?>" required>
</div>
<div class="form-group">
	<label>Email</label>
	<input type="email" class="form-control" name="email" placeholder="Update your email" value="<?php echo $user['email'] ?>" required>
</div>
<div class="form-group">
	<label>Location</label>
	<input type="text" class="form-control" name="location" placeholder="Update your location">
</div>
<div class="form-group">
	<label>Phone</label>
	<input type="text" class="form-control" name="phone" placeholder="Update your phone number">
</div>
<div class="form-group">
	<label>Facebook</label>
	<input type="text" class="form-control" name="facebook" placeholder="Facebook account">
</div>
<div class="form-group">
	<label>Twitter</label>
	<input type="text" class="form-control" name="twitter" placeholder="Twitter account">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>