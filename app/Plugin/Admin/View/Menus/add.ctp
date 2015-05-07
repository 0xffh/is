<div class='row margin-top30'>
    <div class='col-md-6'>
        <h2>Додати нове меню</h2>
        <?php
            echo $this->Form->create('Menu', array('class' => 'form'));
            echo $this->Form->input('name', array('label' => 'Назва на українській', 'div' => 'form-group', 'class' => 'form-control'));
            echo $this->Form->input('key', array('label' => 'Ключ (латиниця)', 'div' => 'form-group', 'class' => 'form-control'));
            echo $this->Form->submit('Добавить', array('class' => 'btn btn-primary'));
            echo $this->Session->flash();
            echo $this->Form->end();
        ?>
    </div>
    <div class='col-md-6'>
        <h4 class='text-right'>Додані меню</h4>
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
</div>