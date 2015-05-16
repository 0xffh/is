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
                ),
                'enctype' => 'multipart/form-data'
            ));
			echo $this->Form->input('File.title', array('label' => 'Назва'));
			echo $this->Form->input('File.info', array('label' => 'Інформація', 'type' => 'textarea'));
            echo $this->Form->input('file', array('type' => 'file', 'name' => 'file', 'class' => false, 'label' => 'Вибрати файл', 'required' => true));
            echo $this->Form->submit('Додати', array('class' => 'btn btn-primary'));
            echo $this->Form->end();
		?>
	</div>
</div>