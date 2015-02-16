<!DOCTYPE html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="content-type" />
	<meta name="description" content="<?= isset($meta_d) ? $meta_d : ""; ?>" />
	<meta name="keywords" content="<?= isset($meta_k) ? $meta_k : ""; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?= isset($page_title) ? $page_title : ""; ?></title>
	<?php
		echo $this->html->meta('icon');  
        echo $this->html->css(array('bootstrap.min', 'style'));
        echo $this->html->script(array('jquery-1.11.2.min', 'bootstrap.min'));
    ?>
</head>
<body>
	<div class="container">
		<?= $this->fetch('content') ?>
	</div>
</body>