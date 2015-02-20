<div class='row col-md-8 col-md-offset-2'>
    <div class="page-header">
        <h1>Реєстрація</h1>
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
        echo $this->Form->input('User.password',
            array(
                'label' => 'Пароль',
                'between' => '<div class="input-group">',
                'after' => '<span class="pointer input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span></div>'
            ));
        echo $this->Form->submit('Зареєструватися', array('class' => 'btn btn-primary pull-left'));
        echo $this->Html->link("<strong>Забули пароль?</strong>", "/users/password", array("class" => "pull-right", "escape" => false));
        echo $this->Form->end();
    ?>
    <p class='margin-top15'><?= "Вже є аккаунт? ".$this->Html->link("Увійти", "/users/login"); ?></p>
</div>
<?php
    echo $this->Html->script(array('users/password'));
?>