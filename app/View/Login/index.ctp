<div class='row'>
    <h1>Вхід до адміністративної панелі</h1>
    <?php
        echo $this->Form->create('User', array('class' => 'form'));
        echo $this->Form->input('email', array('class' => 'form-control', 'div' => 'form-group', 'label' => 'E-mail'));
        echo $this->Form->input('password', array('class' => 'form-control', 'div' => 'form-group', 'label' => 'Пароль'));
        echo $this->Form->submit('Логін', array('class' => 'btn btn-primary'));
        echo $this->Form->end();        
       /* if($show_error) {
            echo '<div class="alert alert-danger margin-top15">Не правильный эл. адрес или пароль</div>';
        }*/
    ?>
</div>