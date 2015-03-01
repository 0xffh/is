<div class='col-md-8'>
    <h2>Редагування пункту меню</h2>
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
        echo $this->Form->input('NavItem.name', array('label' => 'Текст пунтку', 'value' => $item['NavItem']['name']));
        echo $this->Form->input('NavItem.url', array('label' => 'URL', 'value' => $item['NavItem']['url']));
        echo $this->Form->input('NavItem.item_id', array('label' => 'Є підпунктом', 'options' => $other_items_list, 'selected' => $item['NavItem']['item_id']));
        echo $this->Form->input('NavItem.position', array('label' => 'Позиція', 'value' => $item['NavItem']['position']));
        echo "<div class='clearfix'>";
            echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
            echo $this->Html->link('Видалити', '/admin/nav_items/delete/'.$item['NavItem']['id'], array('class' => 'btn btn-danger pull-right'));
        echo "</div>";
        echo $this->Form->end();
        echo $this->Session->flash();
    ?>
</div>