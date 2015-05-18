<?php
    if(!empty($alerts)) {
        echo '<div class="page-header text-center margin-top0"><h2>Оголошення</h2></div>';
        echo '<div class="pageContent page">';
        foreach($alerts as $item) {
            echo '
                <div class="panel '.$item['Alert']['type'].'">
                    <div class="panel-heading"><h3 class="panel-title">'.$item['Alert']['title'].'</h3></div>
                    <div class="panel-body">'.$item['Alert']['text'].'</div>
                </div>
            ';
        }
        echo '</div>';
    }
?>