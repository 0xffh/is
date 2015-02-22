<div class='row margin-top30'>
    <div class='col-md-6'>
        <?= $this->Html->link('Добавить пункт меню', '/admin/menu_items/add/'.$menu['Menu']['id'].'?lang='.$lang_key, array('class' => 'btn btn-default', 'escape' => false)); ?>
    </div>
    <div class='col-md-6'>
        <?= $this->element('parts/language-select', array('class' => 'pull-right')); ?>
    </div>
</div>
<div class='row'>
    <div class='col-md-12'>
        <h3>Элементы меню</h3>
        <?php
            echo "<p>Меню: <strong>".$menu['Menu']['name']."</strong></p>";
        
            if(empty($items)) {
                echo "<p class='text-muted'>Пока ничего нет</p>";
            } else {
                echo "<ul>";
                foreach($items as $item) {
                    $is_dropdown = !empty($item['SubItem']);                    
                    
                    echo "<li>".$this->Html->link($item['MenuItem']['name'], '/admin/menu_items/edit/'.$item['MenuItem']['id']);
                    
                    if($is_dropdown) {
                        echo "<ul>";
                        foreach($item['SubItem'] as $sub_item) {
                            $is_dropdown = !empty($sub_item['SubSubItem']);                            
                            
                            echo "<li>".$this->Html->link($sub_item['name'], '/admin/menu_items/edit/'.$sub_item['id']);
                            
                            if($is_dropdown) {
                                echo "<ul>";
                                foreach($sub_item['SubSubItem'] as $i) {
                                    echo "<li>".$this->Html->link($i['name'], '/admin/menu_items/edit/'.$i['id']);
                                }
                                echo "</ul>";
                            }
                            
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                    
                    echo "</li>";
                }
                echo "</ul>";
            }
        ?>
    </div>
</div>