<div class='row'>
	<div class='col-md-12'>
		<ul class="nav nav-pills">
			<?php
				$current_nav = isset($current_nav) ? $current_nav : "";
				$items = array(
					"/admin" => "<span class='glyphicon glyphicon-home'></span>",
					"/menus" => "Меню",
					"/admin/users" => "Користувачі",
					"/profile" => "Особисте",
					"/admin/pages/all" => "Сторінки",
					"/admin/news" => "Новини",
					"/admin/reviews" => "Відгуки"
				);
				$subitems = array(
					"/menus" => array(
						"/admin/menus" => "Список меню",
						"/admin/menus/add" => "Додати меню",
					),
					"/profile" => array(
						"/admin/profile" => "Інформація",
						"/admin/profile/photo" => "Фотографія",
						"/admin/files" => "Файли"
					)
				);
		
				echo $this->element('parts/nav_output', array('items' => $items, 'subitems' => $subitems, 'current_nav' => $current_nav));
			?>  	
		</ul>
	</div>
</div>