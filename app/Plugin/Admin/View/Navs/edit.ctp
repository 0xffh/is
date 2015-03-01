<div class='col-md-8'>
    <h2>Редагування меню</h2>
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
        echo $this->Form->input('name', array('label' => 'Назва', 'value' => $nav['Nav']['name']));
        echo $this->Form->input('key', array('label' => 'Ключ (латиниця)', 'value' => $nav['Nav']['key']));
        echo "<div class='clearfix'>";
            echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
            echo $this->Html->link('Видалити', '/admin/navs/delete/'.$nav['Nav']['id'], array('class' => 'btn btn-danger pull-right'));
        echo "</div>";
        echo $this->Form->end();
    ?>
</div>