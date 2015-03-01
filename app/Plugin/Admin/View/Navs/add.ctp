<div class='col-md-8'>
    <h2>Додати нове меню</h2>
    <?php
        echo $this->Session->flash();
        
        echo $this->Form->create('Nav',
            array(
                'class' => 'margin-bot15',
                'inputDefaults' => array(                            
                    'div' => 'form-group',
                    'class' => 'form-control'
                )
            )
        );
        echo $this->Form->input('Nav.name', array('label' => 'Назва'));
        echo $this->Form->input('Nav.key', array('label' => 'Ключ (латиниця)'));
        echo $this->Form->submit('Додати', array('class' => 'btn btn-primary'));
        echo $this->Form->end();
    ?>
</div>
<div class='col-md-4'>
    <h2>Додані меню</h2>
    <?php
        if(!empty($navs)) {
            echo "<ul>";
            foreach($navs as $nav) {
                echo "<li>".$this->Html->link($nav['Nav']['name'], '/admin/navs/edit/'.$nav['Nav']['id'])."</li>";
            }
            echo "</ul>";
        }
    ?>
</div>