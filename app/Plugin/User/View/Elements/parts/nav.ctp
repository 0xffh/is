<div class='row'>
	<div class='col-md-12'>
		<ul class="nav nav-pills">
			<?php
				$current_nav = isset($current_nav) ? $current_nav : "";
				$items = array(
					"/user" => "<span class='glyphicon glyphicon-home'></span>",
					"/user/profile" => "Інформація",
					"/user/profile/photo" => "Фотографія",
					"/user/files" => "Файли",
					"/user/profile/password" => "Пароль",
					"/user/pages/all" => "Сторінки",
				);
				$subitems = array();
		
				echo $this->element('parts/nav_output', array('items' => $items, 'subitems' => $subitems, 'current_nav' => $current_nav));
			?>  	
		</ul>
	</div>
</div>