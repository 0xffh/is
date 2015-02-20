<div class='row col-md-8 col-md-offset-2'>
    <div class="page-header">
        <h1>Відновлення пароля</h1>
    </div>
    <?php
        echo $this->Form->create('User',
            array(
                'class' => 'clearfix',
                'inputDefaults' => array(                            
                    'div' => 'form-group',
                    'class' => 'form-control'
                )
            )
        );
        echo $this->Form->input('User.password',
            array(
                'label' => 'Пароль',
                'between' => '<div class="input-group">',
                'after' => '<span class="pointer input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span></div>'
            ));
        echo $this->Form->submit('Відновити', array('class' => 'btn btn-primary pull-left'));
        echo $this->Html->link('Вхід', "/users/login", array("class" => "pull-right"));
        echo $this->Form->end();

    ?>
    </div>
</div>
<?php
    echo $this->Html->script(array('users/password'));
?>