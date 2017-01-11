<?php snippet('header') ?>

<div id="project-content" class="page-content about">

<div id="sections">
	
	<section class="s-image">
	  	<?php $image = $page->featuredimage()->toFile() ?>
			<?php 
				$srcset = '';
				for ($i = 500; $i <= 2500; $i += 500) $srcset .= resizeOnDemand($image, $i) . ' ' . $i . 'w,';
			?>
			<img 
			src="<?= resizeOnDemand($image, 50) ?>" 
			data-src="<?= resizeOnDemand($image, 1500) ?>" 
			data-srcset="<?= $srcset ?>" 
			data-sizes="auto" 
			data-optimumx="1.5" 
			class="lazyimg lazyload" 
			alt="<?= $page->title()->html().' — © '.$site->title()->html() ?>" 
			width="100%" height="auto">

			<noscript>
				<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $page->title()->html().' — © '.$site->title()->html() ?>" width="100%" height="auto" />
			</noscript>
	</section>
	
	<section id="about-intro">

		<div id="about-text">
			<?= $page->text()->kt() ?>
		</div>

		<div id="about-contact">
			<?= $page->contact()->kt() ?>
		</div>

	</div>

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