<div class='col-md-12'>
    <h3>Загрузить превью</h3>
    <?php
        echo $this->Session->flash();
        
        echo "<div class='row'><div class='col-md-12'>";			
            echo $this->Form->create('Service', array('class' => 'form clearfix', 'enctype' => 'multipart/form-data'));
            echo $this->Form->input('file[]', array('type' => 'file', 'name' => 'file[]', 'div' => 'form-group', 'label' => 'Загрузить файл', 'required' => true));
            echo $this->Form->submit('Загрузить', array('class' => 'btn btn-primary', 'name' => 'upload'));
            echo $this->Form->end();
        echo "</div></div>";
        
        if($service['Service']['image_url'] !== null) {
            echo "
                <div class='row margin-top30'>
                    <div class='col-md-12'>
                        <h4>Создать превью</h4>
                        ".$this->Html->image('/'.$service['Service']['image_url'], array('class' => 'thumbnail', 'style' => 'max-width:400px'))."
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <button class='btn btn-default make-preview'>Создать превью</button>
                        <br/>
                        <br/>
                    </div>
                </div>
            ";
        }
    ?>	
</div>

<div class="modal fade bs-example-modal-lg" id='preview-modal'>
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Создать превью</h4>
			</div>
			<div class="modal-body">
				<div style='width:99%; overflow: scroll'>
					<?= $this->Html->image('/'.$service['Service']['image_url'], array('class' => 'target')); ?>
				</div>
			</div>
			<div class="modal-footer">
				<?php
					echo $this->Form->create('Service', array('class' => 'upload', 'type' => 'post'));
					echo $this->Form->hidden('x', array('name' => 'x'));
					echo $this->Form->hidden('y', array('name' => 'y'));
					echo $this->Form->hidden('w', array('name' => 'w'));
					echo $this->Form->hidden('h', array('name' => 'h'));
					echo $this->Form->submit('Сохранить', array('class' => 'btn btn-primary pull-left', 'name' => 'crop'));
					echo $this->Form->button('Закрыть', array('class' => 'btn btn-default'));
					echo $this->Form->end();
				?>
			</div>
		</div>
	</div>
</div>

<?php echo $this->Html->script(array('/admin/js/other/make-preview', '/admin/js/jcrop/js/jquery.Jcrop.min.js')); ?>