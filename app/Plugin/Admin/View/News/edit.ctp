<div class='row'>
    <div class='col-md-12'>
        <h3><?= $page_title; ?></h3>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <?php
            echo $this->Session->flash();
        
            echo $this->Form->create('News',
                array(
                    'class' => 'form',
                    'inputDefaults' => array(                            
                        'div' => 'form-group',
                        'class' => 'form-control'
                    )
                )
            );
            
            echo $this->Form->input('News.title', array('label' => 'Заголовок', 'value' => $news['News']['title']));
			echo $this->Form->input('News.description', array('label' => 'Опис', 'type' => 'textarea', 'value' => $news['News']['description']));
            echo $this->Form->input('News.content', array('label' => 'Контент', 'class' => 'form-control ckeditor', 'value' => $news['News']['content']));
            echo $this->Form->input('News.slug', array('label' => 'Посилання (латиниця)', 'value' => $news['News']['slug']));
            
			echo '<div class="margin-bot20 clearfix">';
				echo $this->Form->submit('Оновити', array('class' => 'btn btn-primary pull-left'));
				echo $this->Html->link('Переглянути', '/news/view/'.$news['News']['slug'], array('class' => 'btn btn-default margin-left15 pull-left', 'target' => '_blank'));
				echo $this->Html->link('Видалити', '/admin/news/delete/'.$news['News']['id'], array('class' => 'btn btn-danger pull-right', 'confirm' => 'Вы впевнені?'));
			echo '</div>';
			
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php
	echo $this->Html->script(array('ckeditor/ckeditor'));
?>