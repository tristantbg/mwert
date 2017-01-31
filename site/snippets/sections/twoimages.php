<section class="s-twoimages">

  <div class="content image<?php e($data->shadow1()->bool(), ' shadow') ?>">
  	<?php $image = $data->content1()->toFile(); 
  			$alt = $page->title()->html().' — © '.$page->date('Y').', '.$site->title()->html();
  			if ($data->captionleft1()->isNotEmpty()) {
  				$alt = $data->captionleft1()->html();
  				if ($data->captionright1()->isNotEmpty()) {
  					$alt .= ', '.$data->captionright1()->html();
  				}
  				$alt .= ' — © '.$site->title()->html();
  			}
  	?>
		<?php 
			$srcset = '';
			for ($i = 500; $i <= 2500; $i += 500) $srcset .= resizeOnDemand($image, $i) . ' ' . $i . 'w,';
		?>
	
		<noscript>
			<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $alt ?>" width="100%" height="auto" />
		</noscript>

		<img 
		src="<?= resizeOnDemand($image, 50) ?>" 
		data-src="<?= resizeOnDemand($image, 1000) ?>" 
		data-srcset="<?= $srcset ?>" 
		data-sizes="auto" 
		data-optimumx="1.5" 
		class="lazyimg lazyload" 
		alt="<?= $alt ?>" 
		width="100%" height="auto">

		<?php if($data->captionleft1()->isNotEmpty()): ?>
		<div class="image-caption">
			<span><?= $data->captionleft1()->html() ?></span>
			<?php if($data->captionright1()->isNotEmpty()): ?>
			<span><?= $data->captionright1()->html() ?></span>
			<?php endif ?>
		</div>
		<?php endif ?>

  </div>

  <div class="content image<?php e($data->shadow2()->bool(), ' shadow') ?>">
  	<?php $image = $data->content2()->toFile(); 
  			$alt = $page->title()->html().' — © '.$page->date('Y').', '.$site->title()->html();
  			if ($data->captionleft2()->isNotEmpty()) {
  				$alt = $data->captionleft2()->html();
  				if ($data->captionright2()->isNotEmpty()) {
  					$alt .= ', '.$data->captionright2()->html();
  				}
  				$alt .= ' — © '.$site->title()->html();
  			}
  	?>
		<?php 
			$srcset = '';
			for ($i = 500; $i <= 2500; $i += 500) $srcset .= resizeOnDemand($image, $i) . ' ' . $i . 'w,';
		?>

		<noscript>
			<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $alt ?>" width="100%" height="auto" />
		</noscript>

		<img 
		src="<?= resizeOnDemand($image, 50) ?>" 
		data-src="<?= resizeOnDemand($image, 1000) ?>" 
		data-srcset="<?= $srcset ?>" 
		data-sizes="auto" 
		data-optimumx="1.5" 
		class="lazyimg lazyload" 
		alt="<?= $alt ?>" 
		width="100%" height="auto">

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