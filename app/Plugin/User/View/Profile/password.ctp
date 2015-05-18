<div class='row'>
    <div class='col-md-12'>
        <h3><?= $page_title; ?> - <?= $user['User']['login'] ?></h3>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <?php
            echo $this->Session->flash();
        
            echo $this->Form->create('User',
                array(
                    'class' => 'form',
                    'inputDefaults' => array(                            
                        'div' => 'form-group',
                        'class' => 'form-control'
                    )
                )
            );
            
            echo $this->Form->input('User.password', array(
                'label' => 'Новий пароль',
                'between' => '<div class="input-group">',
                'after' => '<span class="pointer input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span></div>',
                'value' => ''
            ));
            
            echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
            
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php
	echo $this->Html->script(array('users/password'));
?>