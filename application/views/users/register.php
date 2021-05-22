<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
<div class="row justify-content-center pt-5 pb-5">
	<div class="col-md-4">
		<h2><?php echo $title ?></h2>
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" placeholder="Name">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Username">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
		</div>
		<button class="btn btn-primary" type="submit">Submit</button>
	</div>
</div>
<?php echo form_close(); ?>
