<?php
$this->loadHelper('Geo.GoogleMap');
?>
<nav class="actions col-md-3 col-sm-4 col-xs-12">
    <ul class="side-nav nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List {0}', __('Events')), $this->Calendar->calendarUrlArray(['action' => 'index'], $event->beginning)) ?> </li>
    </ul>
</nav>
<div class="contactAds view col-md-9 col-sm-8 col-xs-12">
	<h1><?= h($event->title ?: __('Event')) ?></h1>

	<div class="col-sm-6 col-xs-12">
		<h2>
			<?php echo $this->Time->niceDate($event->beginning); ?>, <?= h($event->location) ?>
		</h2>

		<div class="well">
			<p><?php echo h($event->address);?> <?php
					if ($event->lat && $event->lng) {
						$coordinatesTo = $event->lat . ',' . $event->lng;
						$mapTo = ['to' => h($coordinatesTo), 'from' => '', 'zoom' => 13];

						$url = $this->GoogleMap->mapUrl($mapTo);
						echo $this->Html->link($this->Format->icon('map-o', ['title' => __('Map')]), $url, ['escape' => false, 'target' => '_blank']);
					}
					?></p>

		<?= $this->Text->autoParagraph(h($event->description)); ?>
		</div>

	</div>
</div>
