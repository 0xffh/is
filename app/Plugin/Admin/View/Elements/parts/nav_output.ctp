<?php
foreach($items as $url => $name) {
    $li_class = $url == $current_nav ? "active" : "";

    if(array_key_exists($url, $subitems)) {
        $dropdown = "<ul class='dropdown-menu'>";
        foreach($subitems[$url] as $u => $n) {
			if(!empty($n)) $dropdown .= "<li>".$this->Html->link($n, $u, array('escape' => false))."</li>";
			else $dropdown .= $u;
        }
        $dropdown .= "</ul>";

        echo "
            <li class='{$li_class} dropdown'>
                ".$this->Html->link($name.' <span class="caret"></span>', '#', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'escape' => false))."
                {$dropdown}
            </li>                    
        ";
    } else {
        echo "<li class='{$li_class}'>".$this->Html->link($name, $url, array('escape' => false))."</li>";
    }
}
echo "
    <li class='pull-right dropdown'>
        <a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-user'></span></a>
        <ul class='dropdown-menu'>
			<li role='presentation' class='dropdown-header'>".$user['User']['login']."</li>
			<li role='presentation' class='divider'></li>
			<li>".$this->Html->link('На сайт &#8594;', '/', array('target' => '_blank', 'escape' => false))."</li>
			<li role='presentation' class='divider'></li>
            <li>".$this->Html->link('Вихід', '/users/logout')."</li>            
        </ul>
    </li>
";