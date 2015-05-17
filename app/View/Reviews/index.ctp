<div class="page-header">
    <h1><?= $page_title; ?></h3>
</div>

<div class='pageContent'>
	<?php
		echo $this->Session->flash();
	
		echo $this->Form->create('Review',
			array(
				'class' => 'form',
				'inputDefaults' => array(                            
					'div' => 'form-group',
					'class' => 'form-control'
				)
			)
		);
		
		echo $this->Form->input('Review.name', array('label' => 'Повне ім\'я'));
		echo $this->Form->input('Review.email', array('label' => 'Email'));
		echo $this->Form->input('Review.text', array('label' => 'Текст відгуку', 'class' => 'form-control ckeditor'));
		
		echo $this->Form->submit('Додати', array('class' => 'btn btn-primary margin-bot20'));
		
		echo $this->Form->end();
	?>
</div>
<?php
	echo $this->Html->script(array('ckeditor-mini/ckeditor'));
?>