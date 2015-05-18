<div class='row margin-top30'>
    <div class='col-md-6'>
        <?= $this->Html->link('Додати файл', '/user/files/add', array('class' => 'btn btn-default')); ?>
    </div>
    <div class='col-md-12'>
        <h3><?= $page_title; ?></h3>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <?php
            echo $this->Session->flash();

            if(empty($files)) {
                echo $this->element('parts/nothing');
            } else {
                echo "<table class='table'>";
                echo "
                    <thead>
                        <tr>
                            <th class='col-md-11'>Назва</th>
                            <th class='col-md-1'></th>
                        </tr>
                    </thead>
                ";
                
                echo "<tbody>";
                
                    foreach($files as $item) {
                        $control = '
                            <div class="btn-group btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-cog"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>'.$this->Html->link('Редагувати', '/user/files/edit/'.$item['File']['id']).'</li>
                                    <li>'.$this->Html->link('Видалити', '/user/files/delete/'.$item['File']['id'], array('confirm' => 'Вы впевнені?')).'</li>
                                </ul>
                            </div>
                        ';
    
                        echo "
                            <tr>
                                <td>
                                    ".$item['File']['title']."
                                    <p class='text-muted small'>/files/users/".$a_user['User']['hash_id']."/".$item['File']['slug']."</p>
                                </td>
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