<!DOCTYPE html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="content-type" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?= isset($page_title) ? $page_title : ""; ?></title>
	<?php
		echo $this->html->meta('icon');  
        echo $this->html->css(array('/admin/css/bootstrap.min', '/admin/css/style'));
        echo $this->html->script(array('/admin/js/jquery-1.11.2.min', '/admin/js/bootstrap.min'));
    ?>
</head>
<body>
	<div class="container">
		<div class="row header"><?= $this->element('parts/nav') ?></div>
		<div class="row content"><?= $this->fetch('content') ?></div>
		<div id='up-button'><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></div>
		<?= $this->html->script('/admin/js/all_page'); ?>
	</div>
</body>