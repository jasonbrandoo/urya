<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<style>
	body{
		font-family: 'Source Sans Pro', sans-serif;
	}
</style>
</head>
<body onload="startTime()">
	<div class="row">
		<div class="col">
			<div class="nav-side-menu">
				<div class="brand">Brand Logo</div>
				<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
				<div class="menu-list">
					<ul id="menu-content" class="menu-content collapse out">
						<li><a href="#">Dashboard</a></li>
						<li><a href="<?php echo base_url() ?>admin/logout">Log out</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-10">
			<div class="container">
				<h1>Hello Sir</h1>
				<h3><div id="txt" class="text-right"></div></h3>
				<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

				<!-- THIS IS -->
				<!-- USER TABLE -->
				<h4><p>Total registered user <?php echo $users ?></p></h4>
				<div class="text-center" style="background-color: #99badd;">
					<table class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Id</th>
								<th scope="col">Name</th>
								<th scope="col">Username</th>
								<th scope="col">Email</th>
								<th scope="col">Total Post</th>
								<th scope="col">Join date</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $x=1; ?>
							<?php foreach ($get_users as $item): ?>
								<tr>
									<th scope="row"><?php echo $x++; ?></th>
									<td><?php echo $item['id']; ?></td>
									<td><?php echo $item['name']; ?></td>
									<td><?php echo $item['username']; ?></td>
									<td><?php echo $item['email']; ?></td>
									<td><?php echo $item['total_post']; ?></td>
									<td><?php echo $item['register_date']; ?></td>
									<td><a class="btn btn-danger" href="admin/deleteuser/<?php echo $item['id']; ?>">Delete</a></td>
								</tr>
							</tbody>
						<?php endforeach ?>
					</table>
				</div>
				<hr><br><br>


				<!-- THIS IS -->
				<!-- CATEGORIES TABLE -->
				<h4><p>Total categories created <?php echo $categories ?></p></h4>
				<div class="text-center" style="background-color: #99badd;">
					<table class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Id</th>
								<th scope="col">Category</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php $x=1; ?>
							<?php foreach ($get_category as $item): ?>
								<tr>
									<th scope="row"><?php echo $x++; ?></th>
									<td><?php echo $item['id']; ?></td>
									<td><?php echo $item['name']; ?></td>
									<td><a class="btn btn-danger" href="admin/delete/<?php echo $item['id']; ?>">Delete</a></td>
								</tr>
							</tbody>
						<?php endforeach ?>
					</table>
				</div>

				<!-- CREATE CATEGORY -->
				<?php echo validation_errors(); ?>
				<?php echo form_open_multipart('admin/create'); ?>
				<div class="form-group">
					<label>Create Category</label>
					<input type="text" name="name" class="form-control" placeholder="Add Category" required>
				</div>
				<button class="btn btn-success" onclick="myFunction()">Submit</button>
				<?php echo form_close() ?>
				<hr><br><br>


				<!-- THIS IS -->
				<!-- NEWS TABLE -->
				<h4><p>Total news created <?php echo $news ?></p></h4>
				<div class="text-center">
					<table class="table table-bordered" style="background-color: #99badd;">
						<thead class="thead-dark">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Title</th>
								<th scope="col">News Id</th>
								<th scope="col">User Id</th>
								<th scope="col">Posted on</th>
								<th scope="col">Category</th>
								<th scope="col">Text</th>
								<!-- <th scope="col"></th> -->
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php $x=1; ?>
							<?php foreach ($get_news as $item): ?>
								<tr>
									<th scope="row"><?php echo $x++; ?></th>
									<td><?php echo $item['title']; ?></td>
									<td><?php echo $item['id_news']; ?></td>
									<td><?php echo $item['user_id']; ?></td>
									<td><?php echo $item['created_at'] ?></td>
									<td><?php echo $item['name'] ?></td>
									<td><?php echo word_limiter($item['text'],10); ?></td>
									<!-- <td><a class="btn btn-warning" href="<?php echo site_url('news/'.$item['slug']); ?>">View</a></td> -->
									<td><a class="btn btn-danger" href="admin/deletenews/<?php echo $item['id_news'] ?>">Delete</a></td>
								</tr>
							</tbody>
						<?php endforeach ?>
					</table>
				</div>

				<!-- CREATE NEWS -->
				
				

				<!-- THIS IS -->
				<!-- COMMENT TABLE -->
				<h4><p>Total commented news <?php echo $comments; ?></p></h4>
				<div class="text-center" style="background-color: #99badd;">
					<table class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th scope="col">No</th>
								<th scope="col">News Id</th>
								<th scope="col">Name</th>
								<th scope="col">Title</th>
								<th scope="col">Body</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php $x=1; ?>
							<?php foreach ($get_comment as $item): ?>
								<tr>
									<th scope="row"><?php echo $x++; ?></th>
									<td><?php echo $item['post_id']; ?></td>
									<td><?php echo $item['name']; ?></td>
									<td><?php echo $item['title']; ?></td>
									<td><?php echo $item['body']; ?></td>
									<td><a class="btn btn-danger" href="<?php echo site_url('admin/deletecomment/'.$item['id']); ?>">Delete</a></td>
								</tr>
							</tbody>
						<?php endforeach ?>
					</table>
				</div>
				<?php if($this->session->flashdata('news_deleted')): ?>
					<?php echo '<p class="alert alert-success">'.$this->session->flashdata('news_deleted').'</p>'; ?>
				<?php endif; ?>
				<?php if($this->session->flashdata('category_created')): ?>
					<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

	<script>
		function startTime() {
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('txt').innerHTML =
			h + ":" + m + ":" + s;
			var t = setTimeout(startTime, 500);
		}
		function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function myFunction() {
	alert("Are you sure?");
}

CKEDITOR.replace( 'editor1' );
</script>
</body>
</html>