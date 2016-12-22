<?php snippet('header') ?>

<?php $projects = $page->children()->visible() ?>

<section id="projects-container">

	<?php foreach ($projects as $key => $project): ?>
	
	<?php if($image = $project->image($project->featuredimage())): ?>

	<div class="project<?php if($project->secondaryimage()->isNotEmpty()){ echo ' with-secondary'; } ?>">
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

					<?php if($secondary = $project->image($project->secondaryimage())): ?>

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