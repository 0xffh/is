<div class='row'>
    <div class='col-md-12'>
        <h3><?= $page_title; ?></h3>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
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
            
            echo $this->Form->input('Review.name', array('label' => 'Повне ім\'я', 'value' => $review['Review']['name']));
            echo $this->Form->input('Review.email', array('label' => 'Email', 'value' => $review['Review']['email']));
            echo $this->Form->input('Review.text', array('label' => 'Текст відгуку', 'class' => 'form-control ckeditor', 'value' => $review['Review']['text']));
            
            echo '<div class="margin-bot20 clearfix">';
                echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left margin-bot20'));
				echo $this->Html->link('Видалити', '/admin/reviews/delete/'.$review['Review']['id'], array('class' => 'btn btn-danger pull-right', 'confirm' => 'Вы впевнені?'));
			echo '</div>';
            
            echo $this->Form->end();
        ?>
    </div>
</div>
<?php
	echo $this->Html->script(array('ckeditor/ckeditor'));
?>