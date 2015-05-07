<div class='row'>
    <div class='col-md-8'>
        <h2>Редаугвання пункту меню</h2>
        <?php
            echo $this->Form->create('MenuItem', array('class' => 'form'));
            echo $this->Form->input('name', array('label' => 'Текст пунтку', 'div' => 'form-group', 'class' => 'form-control', 'value' => $item['MenuItem']['name']));
            echo $this->Form->input('url', array('label' => 'URL', 'div' => 'form-group', 'class' => 'form-control', 'value' => $item['MenuItem']['url']));
            echo $this->Form->input('item_id', array('label' => 'Є підпунктом', 'div' => 'form-group', 'class' => 'form-control', 'options' => $other_items_list, 'selected' => $item['MenuItem']['item_id']));
            echo $this->Form->input('position', array('label' => 'Позиція', 'div' => 'form-group', 'class' => 'form-control', 'value' => $item['MenuItem']['position']));
            echo "<div class='clearfix'>";
                echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
                echo $this->Html->link('Видалити', '/admin/menu_items/delete/'.$item['MenuItem']['id'], array('class' => 'btn btn-danger pull-right'));
            echo "</div>";
            echo $this->Session->flash();
            echo $this->Form->end();
        ?>
    </div>
</div>