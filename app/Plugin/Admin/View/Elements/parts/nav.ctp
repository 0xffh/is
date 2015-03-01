<?php
	$current_nav = isset($current_nav) ? $current_nav : '';
	$items = array(
		'/navs' => 'Меню',
		'/news' => 'Новини',
		'/pages' => 'Сторінки',
	);
	$subitems = array(
		'/navs' => array(
			'/admin/navs' => 'Список меню',
			'/admin/navs/add' => 'Додати меню',
		),
		'/news' => array(
			'/admin/news' => 'Всі новини',
			'/admin/news/add' => 'Додати Новину',                
		),
		'/pages' => array(
			'/admin/pages/all' => 'Всі сторінки',
			'/admin/pages/add' => 'Додати сторінку',                
		)
	);
?>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin"><span class='glyphicon glyphicon-home'></span></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
				<?= $this->element('parts/nav_output', array('items' => $items, 'subitems' => $subitems, 'current_nav' => $current_nav)) ?>
			</ul>
            <ul class="nav navbar-nav navbar-right">
				<li data-toggle="tooltip"><a href="/">На сайт</a></li>
                <li data-toggle="tooltip" data-placement="bottom" title="Вихід"><a href="/users/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
            </ul>
        </div>
    </div>
</nav>