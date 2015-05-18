<div class='row margin-top30'>
    <div class='col-md-6'>
        <?= $this->Html->link('Переглянути відгуки', '/reviews/all', array('class' => 'btn btn-default', 'target' => '_blank    ')); ?>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <h3>Додані відгуки</h3>
        <?php
			echo $this->Session->flash();
			
            if(empty($reviews)) {
                echo $this->element('parts/nothing');
            } else {
                echo "<table class='table'>";
                echo "
                    <thead>
                        <tr>
                            <th class='col-md-3'>Ім'я</th>
							<th class='col-md-2'>E-mail</th>
							<th class='col-md-1'>Статус</th>
                            <th class='col-md-2'>Автор оновлення</th>
                            <th class='col-md-3'>Дата</th>
                            <th class='col-md-1'></th>
                        </tr>
                    </thead>
                ";
				
				echo "<tbody>";
				
                    foreach($reviews as $item) {
                        $published = $item['Review']['published'] ? '<span class="label label-success">Опубліковано</span>' : '<span class="label label-default">Не опубліковано</span>';
                        $menu_activate = $item['Review']['published'] ? 'Деактивувати' : 'Активувати';
                        if($item['Review']['user_id'] != null) {
                            $author_update = $item['User']['login']." / ".$item['User']['UserInfo']['name']."<p class='text-muted small'>"." <i>".$item['User']['UserInfo']['email']."</i></p>";
                        } else {
                            $author_update = '';
                        }
                        
                        $control = '
                            <div class="btn-group btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-cog"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>'.$this->Html->link($menu_activate, '/admin/reviews/changestatus/'.$item['Review']['id']).'</li>
                                    <li role="presentation" class="divider"></li>
                                    <li>'.$this->Html->link('Редагувати', '/admin/reviews/edit/'.$item['Review']['id']).'</li>
                                    <li>'.$this->Html->link('Видалити', '/admin/reviews/delete/'.$item['Review']['id'], array('confirm' => 'Вы впевнені?')).'</li>
                                </ul>
                            </div>
                        ';
    
                        echo "
                            <tr>
                                <td>".$item['Review']['name']."</td>
								<td>".$item['Review']['email']."</td>
								<td>".$published."</td>
								<td>".$author_update."</td>
                                <td>".$item['Review']['created']."</td>
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