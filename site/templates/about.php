<?php snippet('header') ?>

<div id="project-content" class="page-content about">

<div id="sections">
	
	<section id="about-intro">

		<div id="about-text">
			<?= $page->text()->kt() ?>
		</div>

		<div id="about-contact">
			<?= $page->contact()->kt() ?>
		</div>

	</section>

	<?php foreach($page->sections()->toStructure() as $section): ?>
	  <?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
	<?php endforeach ?>

</div>

<footer>
	<div id="back" class="menu-item bottom">
		Back
	</div>
</footer>

<?php snippet('footer') ?>