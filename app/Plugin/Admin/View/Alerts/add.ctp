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
                echo $this->Form->input('Alert.title', array('label' => 'Заголовок', 'div' => 'col-md-6'));
                echo $this->Form->input('Alert.type', array('label' => 'Тип', 'div' => 'col-md-6', 'options' => $types));
            echo '</div>';
            
            echo $this->Form->input('Alert.text', array('label' => 'Текст', 'class' => 'form-control ckeditor'));
            
            echo $this->Form->submit('Додати', array('class' => 'btn btn-primary margin-bot20'));
            
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php
	echo $this->Html->script(array('ckeditor-mini/ckeditor'));
?>