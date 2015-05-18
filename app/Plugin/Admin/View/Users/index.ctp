<div class='row margin-top30'>
    <div class='col-md-6'>
        <?= $this->Html->link('Додати нового користувача', '/admin/users/add', array('class' => 'btn btn-default')); ?>
    </div>
    <div class='col-md-12'>
        <h3><?= $page_title; ?></h3>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <?php
            echo $this->Session->flash();

            if(empty($users)) {
                echo $this->element('parts/nothing');
            } else {
                echo "<table class='table'>";
                echo "
                    <thead>
                        <tr>
                            <th class='col-md-6'>Логін</th>
                            <th class='col-md-2'>Група</th>
                            <th class='col-md-3'>Дата реєстрації</th>
                            <th class='col-md-1'></th>
                        </tr>
                    </thead>
                ";
                
                echo "<tbody>";
                
                    foreach($users as $item) {
    
                        $role = "";
                        switch($item['User']['role']) {
                            case 'guest' :
                                $role = '<span class="label label-warning">Гість</span>';
                            break;
                            case 'user' :
                                $role = '<span class="label label-info">Користувач</span>';
                            break;
                            case 'moder' :
                                $role = '<span class="label label-default">Модератор</span>';
                            break;
                            case 'admin' :
                                $role = '<span class="label label-success">Адміністратор</span>';
                            break;
                        }
    
                        $control = '
                            <div class="btn-group btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-cog"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>'.$this->Html->link('Перегляд', '/users/view/'.$item['User']['hash_id'], array('target' => '_blank')).'</li>
                                    <li role="presentation" class="divider"></li>
                                    <li>'.$this->Html->link('Новий пароль', '/admin/users/password/'.$item['User']['id']).'</li>
                                    <li role="presentation" class="divider"></li>
                                    <li>'.$this->Html->link('Редагувати', '/admin/users/edit/'.$item['User']['id']).'</li>
                                    <li>'.$this->Html->link('Видалити', '/admin/users/delete/'.$item['User']['id'], array('confirm' => 'Вы впевнені?')).'</li>
                                </ul>
                            </div>
                        ';
    
                        echo "
                            <tr>
                                <td>
                                    ".$item['User']['login']."
                                    <p class='text-muted small'>/users/view/".$item['User']['id']."</p>
                                </td>
                                <td>".$role."</td>
                                <td>".$item['User']['created']."</td>
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