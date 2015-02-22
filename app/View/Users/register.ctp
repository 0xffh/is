<div class='row col-md-8 col-md-offset-2'>
    <div class="page-header">
        <h1>Реєстрація</h1>
    </div>
    <?php
        echo $this->Form->create('User',
            array(
                'class' => 'margin-bot15 clearfix',
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
        echo '<div class="pull-right margin-top10">';
            echo 'Вже є аккаунт? '.$this->Html->link("<strong>Увійти</strong>", "/users/login", array("escape" => false));
        echo '</div>';
        echo $this->Form->end();
    ?>
</div>
<?php
    echo $this->Html->script(array('users/password'));
?>