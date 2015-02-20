<div class='row col-md-8 col-md-offset-2'>
    <div class="page-header">
        <h1>Забули пароль?</h1>
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
        echo $this->Form->input('User.login', array('label' => 'Логін'));
        echo $this->Form->submit('Надіслати', array('class' => 'btn btn-primary pull-left'));
        echo $this->Html->link("<strong>Вхід</strong>", "/users/login", array("class" => "pull-right", "escape" => false));
        echo $this->Form->end();
    ?>
    </div>
</div>