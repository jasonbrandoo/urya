<h2><?php echo $title; ?></h2>
<ul class="list-group">
<?php foreach($categories as $category): ?>
	<li class="list-group-item"><a href="<?php echo site_url('/categories/news/'.$category['id']); ?>"><?php echo $category['name']; ?></a></li>
<?php endforeach; ?>
</ul>