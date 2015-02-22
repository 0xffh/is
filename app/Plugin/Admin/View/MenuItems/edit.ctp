<div class='row margin-top30'>
    <div class='col-md-12'>
        <?= $this->element('parts/language-select'); ?>
    </div>
</div>

<div class='row'>
    <div class='col-md-8'>
        <h2>Редактирование пункта меню</h2>
        <?php
            echo $this->Form->create('MenuItem', array('class' => 'form'));
            echo $this->Form->input('name', array('label' => 'Текст пунтка', 'div' => 'form-group', 'class' => 'form-control', 'value' => $item['MenuItem']['name']));
            echo $this->Form->input('url', array('label' => 'URL', 'div' => 'form-group', 'class' => 'form-control', 'value' => $item['MenuItem']['url']));            
            echo $this->Form->input('position', array('label' => 'Позиция', 'div' => 'form-group', 'class' => 'form-control', 'value' => $item['MenuItem']['position']));
            echo "<div class='clearfix'>";
                echo $this->Form->submit('Обновить', array('class' => 'btn btn-primary pull-left'));
                echo $this->Html->link('Удалить', '/admin/menu_items/delete/'.$item['MenuItem']['id'], array('class' => 'btn btn-danger pull-right'));
            echo "</div>";
            echo $this->Session->flash();
            echo $this->Form->end();
        ?>
    </div>
</div>