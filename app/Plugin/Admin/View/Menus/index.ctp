<div class='row margin-top30'>
    <div class='col-md-6'>
        <?= $this->Html->link('Додати нове меню', '/admin/menus/add', array('class' => 'btn btn-default')); ?>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <h3>Додані меню</h3>
        <?php
            echo $this->Session->flash();
            
            if(empty($menus)) {
                echo $this->element('parts/nothing');
            } else {
                echo "<ul>";
                foreach($menus as $menu) {
                    echo "
                        <li class='margin-top5'>
                            <strong>".$this->Html->link($menu['Menu']['name'], '/admin/menus/edit/'.$menu['Menu']['id'])."</strong>                            
                            ".$this->Html->link('<span class="glyphicon glyphicon-plus"></span>', '/admin/menu_items/add/'.$menu['Menu']['id'], array('class' => 'btn btn-default btn-xs', 'escape' => false, 'title' => 'Додати пункт меню'))."
                            ".$this->Html->link('<span class="glyphicon glyphicon-th-list"></span>', '/admin/menu_items/items/'.$menu['Menu']['id'], array('class' => 'btn btn-default btn-xs', 'escape' => false, 'title' => 'Елементи меню'))."
                        </li>
                    ";
                }
                echo "</ul>";
            }
        ?>
    </div>
</div>