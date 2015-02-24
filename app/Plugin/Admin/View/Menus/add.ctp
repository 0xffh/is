<div class='col-md-6'>
    <h2>Добавить новое меню</h2>
    <?php
        echo $this->Form->create('Menu', array('class' => 'form'));
        echo $this->Form->input('name', array('label' => 'Название на русском', 'div' => 'form-group', 'class' => 'form-control'));
        echo $this->Form->input('key', array('label' => 'Ключ (латиница)', 'div' => 'form-group', 'class' => 'form-control'));
        echo $this->Form->submit('Добавить', array('class' => 'btn btn-primary'));
        echo $this->Session->flash();
        echo $this->Form->end();
    ?>
</div>
<div class='col-md-6'>
    <h4 class='text-right'>Добавленные меню</h4>
    <?php
        if(!empty($menus)) {
            echo "<ul>";
            foreach($menus as $menu) {
                echo "<li>".$this->Html->link($menu['Menu']['name'], '/admin/menus/edit/'.$menu['Menu']['id'])."</li>";
            }
            echo "</ul>";
        }
    ?>
</div>