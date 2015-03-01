<div class='col-md-8 col-md-offset-2'>
    <div class="page-header">
        <h1>Вхід до адміністративної панелі</h1>
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
        echo $this->Form->input('User.password', array('label' => 'Пароль'));
        echo $this->Form->submit('Логін', array('class' => 'btn btn-primary pull-left'));
        echo '<div class="pull-right margin-top10">';
            echo 'Немає аккаунту? '.$this->Html->link("<strong>Зареєструватися</strong>", "/users/register", array("escape" => false));
        echo '</div>';
        echo $this->Form->end();
        echo $this->Session->flash();
    ?>
</div>