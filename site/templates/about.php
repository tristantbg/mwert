<?php snippet('header') ?>

<div id="project-content" class="page-content about">

<div id="sections">
	
	<section id="about-contact" class="about-section">
		<div class="section-title">
			Contact
		</div>
		<?= $page->contact()->kt() ?>
	</section>
	
	<section id="about-content">
		<?php foreach($page->sections()->toStructure() as $section): ?>
		  <?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
		<?php endforeach ?>
		
		<section id="credits">
		<div>© <?= date('Y') ?> — All rights reserved</div>
		<div>Design & development by <a href="http://www.tristanbagot.com" target="_blank">Tristan Bagot</a></div>
		</section>
	</section>

</div>

<footer>
	<div id="back" class="menu-item bottom">
		Back
	</div>
</footer>

<?php snippet('footer') ?>