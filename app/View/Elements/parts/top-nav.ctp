<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Кафедра інформаційних систем</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
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
            <ul class="nav navbar-nav navbar-right">
                <li data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Адміністративна панель"><a href="users/login"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></a></li>
            </ul>
        </div>
    </div>
</nav>