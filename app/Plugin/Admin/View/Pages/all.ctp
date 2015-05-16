<div class='row margin-top30'>
    <div class='col-md-6'>
        <?= $this->Html->link('Додати сторінку', '/admin/pages/add', array('class' => 'btn btn-default')); ?>
    </div>
</div>

<div class='row'>
	<div class='col-md-12'>
		<?= $this->Session->flash(); ?>
	</div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <h3>Додані сторінки</h3>
        <?php
            if(empty($pages)) {
                echo $this->element('parts/nothing');
            } else {
                echo "<table class='table'>";
                echo "
                    <thead>
                        <tr>
                            <th>Назва</th>
							<th>Користувач</th>
							<th>Дата оновлення</th>
                            <th></th>
                        </tr>
                    </thead>
                ";
				
				echo "<tbody>";
				
					foreach($pages as $page) {
						
					}
					
                echo "</tbody>";
                
                echo "</table>";

                echo $this->element('parts/pagination');
            }
        ?>
    </div>
</div>