<div class='row margin-top30'>
    <div class='col-md-6'>
        <?= $this->Html->link('Додати новину', '/admin/news/add', array('class' => 'btn btn-default')); ?>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <h3>Додані новини</h3>
        <?php
			echo $this->Session->flash();
			
            if(empty($news)) {
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
				
                    foreach($news as $item) {
                        $control = '
                            <div class="btn-group btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-cog"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>'.$this->Html->link('Перегляд', '/news/view/'.$item['News']['slug'], array('target' => '_blank')).'</li>
                                    <li role="presentation" class="divider"></li>
                                    <li>'.$this->Html->link('Редагувати', '/admin/news/edit/'.$item['News']['id']).'</li>
                                    <li>'.$this->Html->link('Видалити', '/admin/news/delete/'.$item['News']['id'], array('confirm' => 'Вы впевнені?')).'</li>
                                </ul>
                            </div>
                        ';
    
                        echo "
                            <tr>
                                <td>
                                    ".$item['News']['title']."
                                    <p class='text-muted small'>/news/view/".$item['News']['slug']."</p>
                                </td>
								<td>
									".$item['User']['login']." / ".$item['User']['UserInfo']['name']."
									<p class='text-muted small'>"." <i>".$item['User']['UserInfo']['email']."</i></p>
								</td>
								<td>".$item['News']['created']."</td>
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