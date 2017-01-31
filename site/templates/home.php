<?php snippet('header') ?>

<?php $projects = $page->globalorder()->toStructure() ?>

<section id="projects-container">

	<?php foreach ($projects as $key => $entry): ?>
	<?php $project = page($entry->project()->value());
		  $image = $project->image($project->featuredimage());
		  $hasSecondary = $project->secondaryimage()->isNotEmpty();
		  $secondary = null;
		  if ($hasSecondary) {
		  	$secondary = $project->image($project->secondaryimage());
		  }
		  if ($entry->featuredimage()->isNotEmpty()) {
		  	$image = $page->image($entry->featuredimage());
		  	if ($entry->secondaryimage()->isNotEmpty()) {
		  		$secondary = $page->image($entry->secondaryimage());
		  		$hasSecondary = true;
		  	} else {
		  		$hasSecondary = false;
		  		$secondary = null;
		  	}
		  }
	?>
	
	<?php if($image): ?>

	<div class="project<?php if($hasSecondary){ echo ' with-secondary'; } ?>">
		<a href="<?= $project->url() ?>" 
		data-title="<?= $project->title()->html() ?>" 
		data-id="<?= tagslug($project->title()) ?>" 
		data-target="page">

			<div class="image-overflow">

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
					class="featured image lazyimg lazyload" 
					alt="<?= $project->title()->html().' — © '.$site->title()->html() ?>" 
					width="100%" height="auto">

					<?php if($secondary): ?>

					<div class="secondary image<?php e($project->fitheight()->bool(), ' fit-height', '') ?>">
						<?php 
							$srcset = '';
							for ($i = 500; $i <= 2500; $i += 500) $srcset .= resizeOnDemand($secondary, $i) . ' ' . $i . 'w,';
						?>
						<img 
						data-src="<?= resizeOnDemand($secondary, 1000) ?>" 
						data-srcset="<?= $srcset ?>" 
						data-sizes="auto" 
						data-optimumx="1.5" 
						class="lazyimg lazyload" 
						alt="<?= $project->title()->html().' — © '.$site->title()->html() ?>" 
						width="100%" height="auto">

						<noscript>
							<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $project->title()->html().' — © '.$site->title()->html() ?>" width="100%" height="auto" />
						</noscript>

					</div>

					<?php endif ?>

					<noscript>
						<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $project->title()->html().' — © '.$site->title()->html() ?>" width="100%" height="auto" />
					</noscript>

			</div>

			<div class="project-title">
				<span><?= $project->title()->html() ?></span>
				<span class="year"><?= $project->date('Y') ?></span>
			</div>

		</a>
	</div>

	<?php endif ?>

	<?php endforeach ?>

</section>

<?php snippet('footer') ?>