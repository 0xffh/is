<div class='row'>
    <div class='col-md-12'>
        <h3><?= $page_title; ?></h3>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <?php
            echo $this->Session->flash();
        
            echo $this->Form->create('Alert',
                array(
                    'class' => 'form',
                    'inputDefaults' => array(                            
                        'div' => 'form-group',
                        'class' => 'form-control'
                    )
                )
            );
            
            echo '<div class="row margin-bot10">';
                echo $this->Form->input('Alert.title', array('label' => 'Заголовок', 'div' => 'col-md-6', 'value' => $alert['Alert']['title']));
                echo $this->Form->input('Alert.type', array('label' => 'Тип', 'div' => 'col-md-6', 'options' => $types, 'value' => $alert['Alert']['type']));
            echo '</div>';
            
            echo $this->Form->input('Alert.text', array('label' => 'Текст', 'class' => 'form-control ckeditor', 'value' => $alert['Alert']['text']));
            
            echo '<div class="margin-bot20 clearfix">';
                echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
                echo $this->Html->link('Видалити', '/admin/alerts/delete/'.$alert['Alert']['id'], array('class' => 'btn btn-danger pull-right', 'confirm' => 'Вы впевнені?'));
            echo '</div>';
            
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php
	echo $this->Html->script(array('ckeditor-mini/ckeditor'));
?>