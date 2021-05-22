<?php echo form_open('admin/login'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
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