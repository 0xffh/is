<nav class="navbar navbar-default top-menu hidden-xs" role="navigation">
    <div class="container-fluid">					
		<ul class="nav navbar-nav main">
			<li><a target="_blank" href="http://acs.nuft.edu.ua/">Сайт Факультету АКС</a></li>
			<li><a target="_blank" href="http://nuft.edu.ua/">Офіційний сайт НУХТ</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">					
			<li><a target="_blank" href="/users/login">Адміністративна панель</a></li>
		</ul>
    </div>
</nav>
<div class="container-fluid text-center logo">
    <div class="row">
        <div class="col-md-1 col-sm-2 hidden-xs">
            <img src="/img/logo/acs.png">
        </div>
		<div class="col-md-10 col-sm-8 col-xs-12">
			<h2>Кафедра інформаційних систем</h2>
		</div>
		<div class="col-md-1 col-sm-2 hidden-xs">
			<img src="/img/logo/nuft.gif">
		</div>
    </div>
</div>
<div class="container-fluid">
    <div class="row header">
        <div class="col-md-12 main-menu">
            <ul class="nav nav-tabs nav-justified">
                <?php
                    if(!empty($main_menu)) {
                        foreach($main_menu['MenuItem'] as $item) {
                            $is_dropdown = !empty($item['SubItem']);
                            
                            if(!$is_dropdown) {
                                echo '<li>'.$this->Html->link($item['name'], $item['url']).'</li>';
                            } else {
                                echo '<li class="dropdown">';
                                echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$item['name'].' <span class="caret"></span></a>';
                                echo '<ul class="dropdown-menu" role="menu">';
                                foreach($item['SubItem'] as $sub_item) {
                                    echo  '<li><a href="'.$sub_item['url'].'">'.$sub_item['name'].'</a></li>';
                                }
                                echo '</ul>';
                            }
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</div>