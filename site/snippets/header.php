<!DOCTYPE html>
<html lang="en" class="no-js">
<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="canonical" href="<?php echo html($page->url()) ?>" />
	<?php if($page->isHomepage()): ?>
		<title><?= $site->title()->html() ?></title>
	<?php else: ?>
		<title><?= $page->title()->html() ?> | <?= $site->title()->html() ?></title>
	<?php endif ?>
	<?php if($page->isHomepage()): ?>
		<meta name="description" content="<?= $site->description()->html() ?>">
	<?php else: ?>
		<meta name="DC.Title" content="<?= $page->title()->html() ?>" />
		<?php if(!$page->text()->empty()): ?>
			<meta name="description" content="<?= $page->text()->excerpt(250) ?>">
			<meta name="DC.Description" content="<?= $page->text()->excerpt(250) ?>"/ >
			<meta property="og:description" content="<?= $page->text()->excerpt(250) ?>" />
		<?php else: ?>
			<meta name="description" content="">
			<meta name="DC.Description" content=""/ >
			<meta property="og:description" content="" />
		<?php endif ?>
	<?php endif ?>
	<meta name="robots" content="index,follow" />
	<meta name="keywords" content="<?= $site->keywords()->html() ?>">
	<?php if($page->isHomepage()): ?>
		<meta itemprop="name" content="<?= $site->title()->html() ?>">
		<meta property="og:title" content="<?= $site->title()->html() ?>" />
	<?php else: ?>
		<meta itemprop="name" content="<?= $page->title()->html() ?> | <?= $site->title()->html() ?>">
		<meta property="og:title" content="<?= $page->title()->html() ?> | <?= $site->title()->html() ?>" />
	<?php endif ?>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= html($page->url()) ?>" />
	<?php if($page->content()->name() == "project"): ?>
		<?php if (!$page->featured()->empty()): ?>
			<meta property="og:image" content="<?= resizeOnDemand($page->image($page->featured()), 1200) ?>"/>
		<?php endif ?>
	<?php else: ?>
		<?php if(!$site->ogimage()->empty()): ?>
			<meta property="og:image" content="<?= $site->ogimage()->toFile()->width(1200)->url() ?>"/>
		<?php endif ?>
	<?php endif ?>

	<meta itemprop="description" content="<?= $site->description()->html() ?>">
	<!-- <link rel="shortcut icon" href="<?php //url('assets/images/favicon.ico') ?>">
	<link rel="icon" href="<?php //url('assets/images/favicon.ico') ?>" type="image/x-icon"> -->

	<?php 
	echo css('assets/css/build/build.min.css');
	echo js('assets/js/vendor/modernizr.min.js');
	?>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?= url('assets/js/vendor/jquery.min.js') ?>">\x3C/script>')</script>

	<script>
		function loadJS(u){var r=document.getElementsByTagName("script")[0],s=document.createElement("script");s.src=u;r.parentNode.insertBefore(s,r);}

		if(!window.HTMLPictureElement || !('sizes' in document.createElement('img'))){
		    loadJS("/assets/js/vendor/ls.respimg.min.js");
		}
	</script>

	<?php if(!$site->customcss()->empty()): ?>
		<style type="text/css">
			<?php echo $site->customcss()->html() ?>
		</style>
	<?php endif ?>

</head>
<body>

<div class="loader"></div>

<header class="reduced">
	<a href="<?= $site->url() ?>" data-target="index">
		<span id="site-title">
			<div>
			<img src="<?= url('assets/images/manon.svg') ?>" onerror="this.src='<?= url('assets/images/manon.png') ?>'; this.onerror=null;" alt="Manon" width="100%">
			</div>
			<div>
			<img src="<?= url('assets/images/wertenbroek.svg') ?>" onerror="this.src='<?= url('assets/images/wertenbroek.png') ?>'; this.onerror=null;" alt="Wertenbroek" width="100%">
			</div>
		</span>
	</a>
</header>

<?php

$exhibitionsPage = $pages->find('exhibitions');
$exhibitions = $exhibitionsPage->children()->visible();
$projectsPage = $pages->find('projects');
$projects = $projectsPage->children()->visible();
$aboutPage = $pages->find('about');

?>

<?php if($exhibitions->count() > 0): ?>
<div id="exhibitions-menu" class="menu-item">
	<span class="menu-toggle"><?= $exhibitionsPage->title()->html() ?></span>
	<ul class="submenu">
	<?php foreach ($exhibitions as $key => $p): ?>
		<li><a href="<?= $p->url() ?>" data-title="<?= $p->title()->html() ?>" data-target="page"><?= $p->title()->html() ?></a></li>
	<?php endforeach ?>
	</ul>
</div>
<?php endif ?>

<?php if($projects->count() > 0): ?>
<div id="projects-menu" class="menu-item">
	<span class="menu-toggle"><?= $projectsPage->title()->html() ?></span>
	<ul class="submenu">
	<?php foreach ($projects as $key => $p): ?>
		<li><a href="<?= $p->url() ?>" data-title="<?= $p->title()->html() ?>" data-target="page"><?= $p->title()->html() ?></a></li>
	<?php endforeach ?>
	</ul>
</div>
<?php endif ?>

<div id="about-menu" class="menu-item">
	<a href="<?= $aboutPage->url() ?>" data-title="<?= $aboutPage->title()->html() ?>" data-target="page">
	<?= $aboutPage->title()->html() ?>
	</a>
</div>

<div id="container">
<div class="inner <?php e($page->isHomepage(), "home", "page") ?>" data-id="<?= $page->hash() ?>">