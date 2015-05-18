<div class="page-header">
	<h1><?= $page_title; ?></h1>
</div>

<div class='pageContent'>
	<?php
        if(empty($user['File'])) {
            echo $this->element('parts/nothing');
        } else {
            echo "<table class='table'>";
            echo "
                <thead>
                    <tr>
                        <th class='col-md-3'>Назва</th>
                        <th class='col-md-6'>Опис</th>
                        <th class='col-md-2'>Дата</th>
                        <th class='col-md-1'></th>
                    </tr>
                </thead>
            ";
             
            echo "<tbody>";
            
            foreach($user['File'] as $item) {
                $date = new DateTime($item['created']);
                $date_formatted = $date->format('d-m-Y H:i:s');
                
                echo "
                    <tr>
                        <td>".$item['title']."</td>
                        <td>".$item['info']."</td>
                        <td>".$date_formatted."</td>
                        <td><a href='/files/users/".$user['User']['hash_id']."/".$item['slug']."'>Завантажити</a></td>
                    </tr>
                ";
            }
                
            echo "</tbody>";
            
            echo "</table>";
        }
    ?>
</div>