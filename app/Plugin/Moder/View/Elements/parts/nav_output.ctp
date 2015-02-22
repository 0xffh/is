<?php
	foreach($items as $url => $name) {
		$li_class = $url == $current_nav ? 'active' : '';
	
		if(array_key_exists($url, $subitems)) {
			$dropdown = '<ul class="dropdown-menu">';
			foreach($subitems[$url] as $u => $n) {
				if(!empty($n)) $dropdown .= '<li>'.$this->Html->link($n, $u, array('escape' => false)).'</li>';
				else $dropdown .= $u;
			}
			$dropdown .= '</ul>';
	
			echo '
				<li class="'.$li_class.' dropdown">
					'.$this->Html->link($name.' <span class="caret"></span>', '#', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'escape' => false)).
					$dropdown.'
				</li>                    
			';
		} else {
			echo "<li class='{$li_class}'>".$this->Html->link($name, $url, array('escape' => false))."</li>";
		}
	}
?>