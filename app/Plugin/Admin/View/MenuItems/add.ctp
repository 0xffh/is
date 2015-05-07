<div class='row'>
    <div class='col-md-8'>
        <h2>Додати новий пункт меню</h2>
        <?php
            echo $this->Form->create('MenuItem', array('class' => 'form'));
            echo $this->Form->input('name', array('label' => 'Текст пунтку', 'div' => 'form-group', 'class' => 'form-control'));
            echo $this->Form->input('url', array('label' => 'URL', 'div' => 'form-group', 'class' => 'form-control'));
            echo $this->Form->input('item_id', array('label' => 'Є підпунктом', 'div' => 'form-group', 'class' => 'form-control', 'options' => $other_items_list));
            echo $this->Form->input('position', array('label' => 'Позиція', 'div' => 'form-group', 'class' => 'form-control', 'value' => 1));
            echo $this->Form->submit('Додати', array('class' => 'btn btn-primary'));
            echo $this->Session->flash();
            echo $this->Form->end();
        ?>
    </div>
    <div class='col-md-4'>
        <h4 class='text-right'>Інші пункти</h4>
        <?php
            if(!empty($other_items)) {
                echo "<ul>";
                foreach($other_items as $index => $item) {                    
                    echo "<li>".$this->Html->link($item['MenuItem']['name'], '/admin/menu_items/edit/'.$item['MenuItem']['id']);
                    
                    if(!empty($item['SubItem'])) {
                        echo '
                            <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdown-menu-'.$index.'" data-toggle="dropdown">    
                                <span class="caret"></span>
                            </button>
                        ';
                        echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-'.$index.'">';
                        foreach($item['SubItem'] as $si) {
                            echo "<li>".$this->Html->link($si['name'], '/admin/menu_items/edit/'.$si['id'])."</li>";
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