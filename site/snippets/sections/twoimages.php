<section class="s-twoimages">

  <div class="content image">
  	<?php $image = $data->content1()->toFile() ?>
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

		<?php if($data->captionleft1()->isNotEmpty()): ?>
		<div class="image-caption">
			<span><?= $data->captionleft1()->html() ?></span>
			<?php if($data->captionright1()->isNotEmpty()): ?>
			<span><?= $data->captionright1()->html() ?></span>
			<?php endif ?>
		</div>
		<?php endif ?>

  </div>

  <div class="content image">
  	<?php $image = $data->content2()->toFile() ?>
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

		<?php if($data->captionleft2()->isNotEmpty()): ?>
		<div class="image-caption">
			<span><?= $data->captionleft2()->html() ?></span>
			<?php if($data->captionright2()->isNotEmpty()): ?>
			<span><?= $data->captionright2()->html() ?></span>
			<?php endif ?>
		</div>
		<?php endif ?>

  </div>

</section>