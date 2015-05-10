<div class='row'>
    <div class='col-md-12'>
        <h3><?= $page_title; ?></h3>
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
            
            echo '<div class="row margin-bot10">';
                echo $this->Form->input('User.login', array('label' => 'Логін', 'div' => 'col-md-4'));
                echo $this->Form->input('User.password', array(
                    'label' => 'Пароль',
                    'between' => '<div class="input-group">',
                    'after' => '<span class="pointer input-group-addon"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span></div>',
                    'value' => '',
                    'div' => 'col-md-4'
                ));
                echo $this->Form->input('User.role', array('label' => 'Роль', 'options' => $roles, 'div' => 'col-md-4'));
            echo '</div>';
            
            echo '<div class="row margin-bot10">';
                echo $this->Form->input('UserInfo.name', array('label' => 'Ім\'я', 'div' => 'col-md-4'));
                echo $this->Form->input('UserInfo.email', array('label' => 'E-mail', 'div' => 'col-md-4'));
                echo $this->Form->input('UserInfo.contact', array('label' => 'Контакти', 'div' => 'col-md-4'));
            echo '</div>';
            
            echo $this->Form->input('UserInfo.content', array('label' => 'Інформація', 'class' => 'form-control ckeditor'));
            
            echo $this->Form->submit('Додати', array('class' => 'btn btn-primary margin-bot20'));
            
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php
	echo $this->Html->script(array('ckeditor/ckeditor', 'users/password'));
?>