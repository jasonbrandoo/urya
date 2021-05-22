<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sepakbola</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- bootstrap css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<!-- Optional JavaScript -->
</head>
<body>

	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 25px;">
		<a class="navbar-brand" href="#">Lemonade</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="<?php echo base_url() ?>news">Home <span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="<?php echo base_url() ?>categories">Categories</a>
			</div>
			<div class="navbar-nav ml-auto">
				<?php if(!$this->session->userdata('log_in')): ?>
					<a class="nav-item nav-link" href="<?php echo base_url() ?>users/register">Register</a>
					<a class="nav-item nav-link" href="<?php echo base_url() ?>users/login">Login</a>
				<?php endif; ?>
				<?php if($this->session->userdata('log_in')): ?>
					<a class="nav-item nav-link" href="<?php echo base_url() ?>news/create">Create News</a>
					<a class="nav-item nav-link" href="<?php echo base_url('users/profile/'.$this->session->userdata('username')); ?>"><?php echo $this->session->userdata('username') ?></a>
					<a class="nav-item nav-link" href="<?php echo base_url() ?>users/logout">Log out</a>
				<?php endif; ?>
			</div>
		</div>
	</nav>

	<div class="container header">
		