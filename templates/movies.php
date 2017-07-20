<?php
script('cinema', 'script');
style('cinema', 'style');
?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('navigation/movies')); ?>
		<?php print_unescaped($this->inc('settings/movies')); ?>
	</div>

	<div id="app-content">
		<div id="app-content-wrapper">
			<?php print_unescaped($this->inc('content/movies')); ?>
		</div>
	</div>
</div>

