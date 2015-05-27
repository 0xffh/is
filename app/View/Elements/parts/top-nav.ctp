<nav class="navbar navbar-default top-menu" role="navigation">
    <div class="container-fluid">					
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav main">
                <li><a target="_blank" href="http://acs.nuft.edu.ua/">Сайт Факультету АКС</a></li>
                <li><a target="_blank" href="http://nuft.edu.ua/">Офіційний сайт НУХТ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">					
                <li><a target="_blank" href="/users/login">Адміністративна панель</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid text-center logo">
    <div class="row">
        <div class="col-md-12">
            <img src="/img/header.png">
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