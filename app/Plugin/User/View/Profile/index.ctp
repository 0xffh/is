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

            echo '<div class="margin-bot10 clearfix">';
                echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
                echo $this->Html->link('Перегляд', '/users/view/'.$user['User']['login'], array('class' => 'btn btn-info margin-left15', 'target' => '_blank'));
            echo '</div>';

			echo '<div class="row margin-bot10">';
				echo $this->Form->input('UserInfo.name', array('label' => 'Ім\'я', 'value' => $user['UserInfo']['name'], 'div' => 'col-md-4'));
				echo $this->Form->input('UserInfo.email', array('label' => 'E-mail', 'value' => $user['UserInfo']['email'], 'div' => 'col-md-4'));
                echo $this->Form->input('UserInfo.contact', array('label' => 'Контакти', 'value' => $user['UserInfo']['contact'], 'div' => 'col-md-4'));
			echo '</div>';
			
            echo $this->Form->input('UserInfo.content', array('label' => 'Інформація', 'class' => 'form-control ckeditor', 'value' => $user['UserInfo']['content']));
            
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php
	echo $this->Html->script(array('ckeditor/ckeditor'));
?>