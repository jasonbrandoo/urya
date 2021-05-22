<?php echo form_open('users/login'); ?>
<div class="row justify-content-center mt-5">
	<div class="col-md-4">
		<h3 class="text-center"><?php echo $title; ?></h3>
		<div class="form-group">
			<input type="text" class="form-control" name="username" placeholder="Username" required>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="Password" required>
		</div>
		<button class="btn btn-primary" type="submit">Login</button>
	</div>
</div>
</form>
