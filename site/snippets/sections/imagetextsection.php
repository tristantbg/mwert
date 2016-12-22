<section class="s-imagetext <?php e($data->position() == "right", "right", "left") ?>">

  <?php if($data->position() == "left"): ?>
	<div class="content">
		<?= $data->textcontent()->kt() ?>
	</div>
  <?php endif ?>

  <div class="content image">
  	<?php $image = $data->content()->toFile() ?>
		<?php 
			$srcset = '';
			for ($i = 500; $i <= 2500; $i += 500) $srcset .= resizeOnDemand($image, $i) . ' ' . $i . 'w,';
		?>
		<img 
		src="<?= resizeOnDemand($image, 50) ?>" 
		data-src="<?= resizeOnDemand($image, 1000) ?>" 
		data-srcset="<?= $srcset ?>" 
		data-sizes="auto" 
		data-optimumx="1.5" 
		class="lazyimg lazyload" 
		alt="<?= $page->title()->html().' — © '.$site->title()->html() ?>" 
		width="100%" height="auto">

		<noscript>
			<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $page->title()->html().' — © '.$site->title()->html() ?>" width="100%" height="auto" />
		</noscript>

		<?php if($data->captionleft()->isNotEmpty()): ?>
		<div class="image-caption">
			<span><?= $data->captionleft()->html() ?></span>
			<?php if($data->captionright()->isNotEmpty()): ?>
			<span><?= $data->captionright()->html() ?></span>
			<?php endif ?>
		</div>
		<?php endif ?>

  </div>

   <?php if($data->position() == "right"): ?>
	<div class="content">
		<?= $data->textcontent()->kt() ?>
	</div>
  <?php endif ?>

</section>