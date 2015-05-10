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
            
            echo $this->Form->input('UserInfo.email', array('label' => 'E-mail', 'value' => $user['UserInfo']['email']));
            echo $this->Form->input('UserInfo.name', array('label' => 'Ім\'я', 'value' => $user['UserInfo']['name']));
            echo $this->Form->input('UserInfo.contact', array('label' => 'Контакти', 'value' => $user['UserInfo']['contact']));
			echo $this->Form->input('User.role', array('label' => 'Роль', 'options' => $roles, 'value' => $user['User']['role']));
            echo $this->Form->input('UserInfo.content', array('label' => 'Інформація', 'class' => 'form-control ckeditor', 'value' => $user['UserInfo']['content']));
            
            echo '<div class="margin-bot20 clearfix">';
                echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
                echo $this->Html->link('Видалити', '/admin/users/delete/'.$user['User']['id'], array('class' => 'btn btn-danger pull-right'));
            echo '</div>';
            
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php
	echo $this->Html->script(array('ckeditor/ckeditor'));
?>