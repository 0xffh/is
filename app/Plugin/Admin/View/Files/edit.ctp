<div class='row'>
    <div class='col-md-12'>
        <h3><?= $page_title; ?></h3>
    </div>
</div>

<div class='row'>
	<div class='col-md-12'>
		<?php
            echo $this->Session->flash();
            
            echo $this->Form->create('File', array(
                'class' => 'form',
                'inputDefaults' => array(                            
                    'div' => 'form-group',
                    'class' => 'form-control'
                )
            ));
			echo $this->Form->input('File.title', array('label' => 'Назва', 'value' => $file['File']['title']));
			echo $this->Form->input('File.info', array('label' => 'Інформація', 'type' => 'textarea', 'value' => $file['File']['info']));
            echo '<div class="margin-bot20 clearfix">';
                echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
                echo $this->Html->link('Видалити', '/admin/files/delete/'.$file['File']['id'], array('class' => 'btn btn-danger pull-right', 'confirm' => 'Вы впевнені?'));
            echo '</div>';
            echo $this->Form->end();
		?>
	</div>
</div>