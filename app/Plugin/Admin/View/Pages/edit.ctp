<div class='row'>
    <div class='col-md-12'>
        <h3><?= $page_title; ?></h3>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <?php
            echo $this->Session->flash();
        
            echo $this->Form->create('Page',
                array(
                    'class' => 'form',
                    'inputDefaults' => array(                            
                        'div' => 'form-group',
                        'class' => 'form-control'
                    )
                )
            );
            
            echo $this->Form->input('Page.title', array('label' => 'Заголовок', 'value' => $page['Page']['title']));
            echo $this->Form->input('Page.content', array('label' => 'Контент', 'class' => 'form-control ckeditor', 'value' => $page['Page']['content']));
            echo $this->Form->input('Page.slug', array('label' => 'Посилання (латиниця)', 'value' => $page['Page']['slug']));
            
			echo '<div class="margin-bot20 clearfix">';
				echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
				echo $this->Html->link('Переглянути', '/pages/view/'.$page['Page']['id'], array('class' => 'btn btn-default margin-left15 pull-left', 'target' => '_blank'));
				echo $this->Html->link('Видалити', '/admin/pages/delete/'.$page['Page']['id'], array('class' => 'btn btn-danger pull-right', 'confirm' => 'Вы впевнені?'));
			echo '</div>';
			
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php
	echo $this->Html->script(array('ckeditor/ckeditor'));
?>