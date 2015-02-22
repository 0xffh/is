<div class='row margin-top30'>
    <div class='col-md-6'>
        <h2>Редактирование меню</h2>
        <?php
            echo $this->Form->create('Menu', array('class' => 'form'));
            echo $this->Form->input('name', array('label' => 'Название на русском', 'div' => 'form-group', 'class' => 'form-control', 'value' => $menu['Menu']['name']));
            echo $this->Form->input('key', array('label' => 'Ключ (латиница)', 'div' => 'form-group', 'class' => 'form-control', 'value' => $menu['Menu']['key']));
            echo "<div class='clearfix'>";
                echo $this->Form->submit('Обновить', array('class' => 'btn btn-primary pull-left'));
                echo $this->Html->link('Удалить', '/admin/menus/delete/'.$menu['Menu']['id'], array('class' => 'btn btn-danger pull-right'));
            echo "</div>";
            echo $this->Session->flash();
            echo $this->Form->end();
        ?>
    </div>    
</div>