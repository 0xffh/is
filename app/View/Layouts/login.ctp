<!DOCTYPE html>
<head>
	<?php echo $this->html->charset(); ?>
	<title><?= isset($page_title) ? $page_title : ""; ?></title>
	<?php
		echo $this->html->meta('icon');  
        echo $this->html->css(array('bootstrap.min', 'style'));
        echo $this->html->script(array('jquery-1.11.2.min', 'bootstrap.min'));
    ?>
</head>
<body>
    <?= $this->fetch('content') ?>
</body>