<div class='row margin-top30'>
    <div class='col-md-6'>
        <?= $this->Html->link('Додати сторінку', '/admin/pages/add', array('class' => 'btn btn-default')); ?>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <h3>Додані сторінки</h3>
        <?php
			echo $this->Session->flash();
			
            if(empty($pages)) {
                echo $this->element('parts/nothing');
            } else {
                echo "<table class='table'>";
                echo "
                    <thead>
                        <tr>
                            <th class='col-md-5'>Назва</th>
							<th class='col-md-3'>Користувач</th>
							<th class='col-md-3'>Дата оновлення</th>
                            <th class='col-md-1'></th>
                        </tr>
                    </thead>
                ";
				
				echo "<tbody>";
				
                    foreach($pages as $item) {
                        $control = '
                            <div class="btn-group btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-cog"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>'.$this->Html->link('Перегляд', '/pages/view/'.$item['Page']['slug'], array('target' => '_blank')).'</li>
                                    <li role="presentation" class="divider"></li>
                                    <li>'.$this->Html->link('Редагувати', '/admin/pages/edit/'.$item['Page']['id']).'</li>
                                    <li>'.$this->Html->link('Видалити', '/admin/pages/delete/'.$item['Page']['id'], array('confirm' => 'Вы впевнені?')).'</li>
                                </ul>
                            </div>
                        ';
    
                        echo "
                            <tr>
                                <td>
                                    ".$item['Page']['title']."
                                    <p class='text-muted small'>/pages/view/".$item['Page']['slug']."</p>
                                </td>
								<td>
									".$item['User']['login']." / ".$item['User']['UserInfo']['name']."
									<p class='text-muted small'>"." <i>".$item['User']['UserInfo']['email']."</i></p>
								</td>
								<td>".$item['Page']['modified']."</td>
                                <td>".$control."</td>
                            </tr>
                        ";
                    }
					
                echo "</tbody>";
                
                echo "</table>";

                echo $this->element('parts/pagination');
            }
        ?>
    </div>
</div>