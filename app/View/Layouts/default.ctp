<!DOCTYPE html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="content-type" />
	<meta name="description" content="<?= isset($meta_d) ? $meta_d : ""; ?>" />
	<meta name="keywords" content="<?= isset($meta_k) ? $meta_k : ""; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?= isset($page_title) ? $page_title : ""; ?></title>
	<?php
		echo $this->html->meta('icon');  
        echo $this->html->css(array('bootstrap.min', 'style'));
        echo $this->html->script(array('jquery-1.11.2.min', 'bootstrap.min'));
    ?>
</head>
<body>
	<div class="container">
		<div class="row header"><?= $this->element('parts/top-nav'); ?></div>
		<div class="row">
			<div class="col-md-8 content">
				<?= $this->fetch('content') ?>
			</div>
			<div class="col-md-4">
				<?= $this->element('parts/right-panel'); ?>
			</div>
		</div>
		<div class="row footer"><?= $this->element('parts/footer'); ?></div>
		<div id='up-button'><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></div>
		<?= $this->html->script('all_page'); ?>
	</div>
</body>