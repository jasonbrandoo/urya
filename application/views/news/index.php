<h2><?php echo $title; ?></h2><br>
<?php foreach($results as $news_item): ?>
	<h3><?php echo $news_item['title']; ?></h3>
	<div class="row">
		<div class="col-md-3">
			<img class="post-thumbnail" src="<?php echo site_url(); ?>assets/img/<?php echo $news_item['post_image']; ?>">
		</div>
		<div class="col-md-9">
			<small class="posted-on">Posted on :<?php echo $news_item['created_at']; ?> in <strong><?php echo $news_item['name']; ?></strong> </small><br>
			<?php echo word_limiter($news_item['text'],20); ?>
			<br>
			<a class="btn btn-info" href="<?php echo site_url('news/view/'.$news_item['slug']); ?>">View Article</a><br><br>
		</div>
	</div><br><br>
<?php endforeach; ?>
<?php echo $links ?>