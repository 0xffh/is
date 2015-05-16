<div class='row'>
    <div class='col-md-12'>
        <h3><?= $page_title; ?></h3>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <?php
            echo $this->Session->flash();
        
            echo $this->Form->create('Page',
                array(
                    'class' => 'form',
                    'inputDefaults' => array(                            
                        'div' => 'form-group',
                        'class' => 'form-control'
                    )
                )
            );
            
            echo $this->Form->input('Page.title', array('label' => 'Заголовок'));
            echo $this->Form->input('Page.content', array('label' => 'Контент', 'class' => 'form-control ckeditor'));
            
            echo $this->Form->submit('Додати', array('class' => 'btn btn-primary margin-bot20'));
            
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php
	echo $this->Html->script(array('ckeditor/ckeditor'));
?>