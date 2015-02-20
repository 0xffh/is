<div class='row col-md-8 col-md-offset-2'>
    <div class="page-header">
        <h1>Вхід до адміністративної панелі</h1>
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
        echo $this->Form->input('User.password', array('label' => 'Пароль'));
        echo $this->Form->submit('Логін', array('class' => 'btn btn-primary pull-left'));
        echo $this->Html->link("<strong>Забули пароль?</strong>", "/users/password", array("class" => "pull-right", "escape" => false));
        echo $this->Form->end();
    ?>
    <p class='margin-top15'><?= "Немає аккаунту? ".$this->Html->link("Зареєструватися", "/users/register"); ?></p>
</div>