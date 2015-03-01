<div class='col-md-12'>
    <div class='row'>
        <div class='col-md-12'>
            <?= $this->Session->flash(); ?>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-6'>
            <?= $this->Html->link('Додати нове меню', '/admin/navs/add', array('class' => 'btn btn-default')); ?>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <h3>Додані меню</h3>
            <?php
                if(empty($navs)) {
                    echo "<p class='text-muted'>Поки нічого немає</p>";
                } else {
                    echo "<ul>";
                    foreach($navs as $nav) {
                        echo "
                            <li class='margin-top5'>
                                <strong>".$this->Html->link($nav['Nav']['name'], '/admin/navs/edit/'.$nav['Nav']['id'])."</strong>                            
                                ".$this->Html->link('<span class="glyphicon glyphicon-plus"></span>', '/admin/nav_items/add/'.$nav['Nav']['id'], array('class' => 'btn btn-default btn-xs', 'escape' => false, 'title' => 'Додати пункт меню'))."
                                ".$this->Html->link('<span class="glyphicon glyphicon-th-list"></span>', '/admin/nav_items/items/'.$nav['Nav']['id'], array('class' => 'btn btn-default btn-xs', 'escape' => false, 'title' => 'Елементи меню'))."
                            </li>
                        ";
                    }
                    echo "</ul>";
                }
            ?>
        </div>
    </div>
</div>