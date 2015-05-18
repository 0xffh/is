<div class='row margin-top30'>
    <div class='col-md-6'>
        <?= $this->Html->link('Додати оголошення', '/admin/alerts/add', array('class' => 'btn btn-default')); ?>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <h3>Додані оголошення</h3>
        <?php
			echo $this->Session->flash();
			
            if(empty($alerts)) {
                echo $this->element('parts/nothing');
            } else {
                echo "<table class='table'>";
                echo "
                    <thead>
                        <tr>
                            <th class='col-md-3'>Назва</th>
                            <th class='col-md-2'>Тип</th>
							<th class='col-md-3'>Користувач</th>
							<th class='col-md-1'>Статус</th>
							<th class='col-md-2'>Дата створення</th>
                            <th class='col-md-1'></th>
                        </tr>
                    </thead>
                ";
				
				echo "<tbody>";
				
                foreach($alerts as $item) {
                    $type = $types[$item['Alert']['type']];
                    $published = $item['Alert']['published'] ? '<span class="label label-success">Опубліковано</span>' : '<span class="label label-default">Не опубліковано</span>';
                    $menu_activate = $item['Alert']['published'] ? 'Деактивувати' : 'Активувати';
                    
                    $control = '
                        <div class="btn-group btn-group-xs">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>'.$this->Html->link($menu_activate, '/admin/alerts/changestatus/'.$item['Alert']['id']).'</li>
                                <li role="presentation" class="divider"></li>
                                <li>'.$this->Html->link('Редагувати', '/admin/alerts/edit/'.$item['Alert']['id']).'</li>
                                <li>'.$this->Html->link('Видалити', '/admin/alerts/delete/'.$item['Alert']['id'], array('confirm' => 'Вы впевнені?')).'</li>
                            </ul>
                        </div>
                    ';

                    echo "
                        <tr>
                            <td>".$item['Alert']['title']."</td>
                            <td>".$type."</td>
                            <td>
                                ".$item['User']['login']." / ".$item['User']['UserInfo']['name']."
                                <p class='text-muted small'>"." <i>".$item['User']['UserInfo']['email']."</i></p>
                            </td>
                            <td>".$published."</td>
                            <td>".$item['Alert']['created']."</td>
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