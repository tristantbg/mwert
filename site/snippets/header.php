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
		<?php if ($page->featuredimage()->isNotEmpty()): ?>
			<meta property="og:image" content="<?= resizeOnDemand($page->image($page->featuredimage()), 1200) ?>"/>
		<?php endif ?>
		<?php if ($page->secondaryimage()->isNotEmpty()): ?>
			<meta property="og:image" content="<?= resizeOnDemand($page->image($page->secondaryimage()), 1200) ?>"/>
		<?php endif ?>
	<?php else: ?>
		<?php if($site->ogimage()->isNotEmpty()): ?>
			<meta property="og:image" content="<?= $site->ogimage()->toFile()->width(1200)->url() ?>"/>
		<?php endif ?>
	<?php endif ?>

	<meta itemprop="description" content="<?= $site->description()->html() ?>">
	<link rel="shortcut icon" href="">
	<link rel="icon" href="" type="image/x-icon">

	<?php 
	echo css('assets/css/build/build.min.css?=v3.0');
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
<body<?php e($page->content()->name() == 'about', ' class="about"') ?>>

<div id="outdated">
	<div class="inner">
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser.
	<br>Please <a href="http://outdatedbrowser.com" target="_blank">upgrade your browser</a> to improve your experience.</p>
	</div>
</div>

<div class="loader"></div>

<?php $intro = $site->intro()->toStructure()->shuffle()->first() ?>
<?php if ($intro): ?>

<?php $introback = $intro->introback() ?>
<?php $introfront = $intro->introfront() ?>
<?php if($introback->isNotEmpty()): ?>
<div id="intro">
	<div class="back<? e($intro->distort()->bool(), ' distort') ?><? e($intro->colorsmotion()->bool(), ' hue-minus') ?>" style="background-image: url('<?= $introback->toFile()->url() ?>');">
	</div>
	<?php if($introfront->isNotEmpty()): ?>
	<div class="front<?php echo ' '.$intro->effect(); ?><? e($intro->imagemotion()->bool(), ' move') ?><? e($intro->colorsmotion()->bool(), ' hue-plus') ?>" style="background-image: url('<?= $introfront->toFile()->url() ?>');">></div>
	<?php endif ?>
</div>
<?php endif ?>

<?php endif ?>

<header<?php e($intro == null, ' class="reduced"') ?>>
	<a href="<?= $site->url() ?>" data-target="index">
		<span id="site-title">
			<div>
			<img src="<?= url('assets/images/manon.svg') ?>" onerror="this.src='<?= url('assets/images/manon.png') ?>'; this.onerror=null;" alt="Manon" width="100%">
			</div>
			<div>
			<img src="<?= url('assets/images/wertenbroek.svg') ?>" onerror="this.src='<?= url('assets/images/wertenbroek.png') ?>'; this.onerror=null;" alt="Wertenbroek" width="100%">
			</div>
			<img class="logo" src="<?= url('assets/images/mm.svg') ?>" onerror="this.src='<?= url('assets/images/mm.png') ?>'; this.onerror=null;" alt="Manon Wertenbroek" width="100%">
		</span>
	</a>
</header>

<?php

$exhibitionsPage = $pages->find('exhibitions');
$exhibitions = $exhibitionsPage->children()->visible();
$projectsPage = $pages->find('work');
$projects = $projectsPage->children()->visible();
$aboutPage = $pages->find('about');

?>

<?php if($projects->count() > 0): ?>
<div id="projects-menu" class="menu-item">
	<span class="menu-toggle"><?= $projectsPage->title()->html() ?></span>
	<ul class="submenu">
	<?php foreach ($projects as $key => $p): ?>
		<li><a href="<?= $p->url() ?>" data-title="<?= $p->title()->html() ?>" data-target="page"><?= $p->title()->html() ?></a></li>
	<?php endforeach ?>
	</ul>
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
</div>
<?php endif ?>

<div id="about-menu" class="menu-item top">
	<a href="<?= $aboutPage->url() ?>" data-title="<?= $aboutPage->title()->html() ?>" data-target="about">
	<?= $aboutPage->title()->html() ?>
	</a>
</div>

<div id="container">
<div class="inner <?php e($page->isHomepage(), "home", "page") ?>" data-id="<?= $page->hash() ?>">