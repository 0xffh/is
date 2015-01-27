<!DOCTYPE html>
<head>
	<?php echo $this->html->charset(); ?>
	<title><?= isset($page_title) ? $page_title : ""; ?></title>
	<?php
		echo $this->html->meta('icon');        
        echo $this->html->css(array('/admin/css/bootstrap.min', '/admin/css/style'));
        echo $this->html->script(array('/admin/js/jquery-1.11.2.min', '/admin/js/bootstrap.min'));
    ?>
</head>
<body>
	<?= $this->fetch('content') ?>
</body>