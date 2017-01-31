<?php snippet('header') ?>

<div id="project-content" class="page-content">

<div id="sections">

	<?php foreach($page->sections()->toStructure() as $section): ?>
	  <?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
	<?php endforeach ?>

	<?php if($page->text()->isNotEmpty()): ?>
	<section id="project-description">
		<div class="project-title">
			<h1><?= $page->title()->html() ?></h1>
			<?php if($page->subtitle()->isNotEmpty()): ?>
			<h1><?= $page->subtitle()->html() ?></h1>
			<?php endif ?>
		</div>
		<div class="project-text">
			<?= $page->text()->kt() ?>
		</div>
	</section>
	<?php endif ?>

</div>

<footer>
	<div id="page-title" class="menu-item bottom">
		<?= $page->title()->html() ?>
	</div>
	
	<div id="next-project" class="menu-item bottom">
		<?php if($page->hasNextVisible()): ?>
		<?php $next = $page->nextVisible() ?>
		<?php else: ?>
		<?php $next = $page->parent()->children()->visible()->first() ?>
		<?php endif ?>
		<a href="<?= $next->url() ?>" data-title="<?= $next->title()->html() ?>" data-target="page">
		Next
		</a>	
	</div>
</footer>

<?php snippet('footer') ?>