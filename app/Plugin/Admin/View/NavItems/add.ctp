<div class='col-md-8'>
    <h2>Додати новий пункт меню</h2>
    <?php
        echo $this->Form->create('NavItem',
            array(
                'class' => 'margin-bot15',
                'inputDefaults' => array(                            
                    'div' => 'form-group',
                    'class' => 'form-control'
                )
            )
        );
        echo $this->Form->input('name', array('label' => 'Текст пунтку'));
        echo $this->Form->input('url', array('label' => 'URL'));
        echo $this->Form->input('item_id', array('label' => 'Є підпунктом', 'options' => $other_items_list));
        echo $this->Form->input('position', array('label' => 'Позиція', 'value' => 1));
        echo $this->Form->submit('Додати', array('class' => 'btn btn-primary'));
        echo $this->Form->end();
        echo $this->Session->flash();
    ?>
</div>
<div class='col-md-4'>
    <h2>Інші пункти</h2>
    <?php
        if(!empty($other_items)) {
            echo "<ul>";
            foreach($other_items as $index => $item) {                    
                echo "<li>".$this->Html->link($item['NavItem']['name'], '/admin/nav_items/edit/'.$item['NavItem']['id']);
                
                if(!empty($item['SubItem'])) {
                    echo '
                        <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdown-menu-'.$index.'" data-toggle="dropdown">    
                            <span class="caret"></span>
                        </button>
                    ';
                    echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-'.$index.'">';
                    foreach($item['SubItem'] as $si) {
                        echo "<li>".$this->Html->link($si['name'], '/admin/nav_items/edit/'.$si['id'])."</li>";
                    }
                    echo "</ul>";
                }
                
                echo "</li>";
            }
            echo "</ul>";
        }
    ?>
</div>