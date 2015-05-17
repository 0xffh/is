<div class="page-header">
        <h1><?= $page_title; ?></h1>
</div>

<div class='pageContent'>
    <?php
        if(empty($reviews)) {
            echo $this->element('parts/nothing');
        } else {
            foreach($reviews as $item) {
                $date = new DateTime($item['Review']['created']);
                $date_formatted = $date->format('d-m-Y H:i:s');
                
                echo '
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">'.$item['Review']['name'].'
                                <small>'.' <a target="_blank" href="mailto:'.$item['Review']['email'].'">'.$item['Review']['email'].'</a></small>
                                <br>
                                <small>'.$date_formatted.'</small>
                            </h4>
                            '.$item['Review']['text'].'
                        </div>
                    </div>
                ';
            }
        echo $this->element('parts/pagination');
        }
    ?>
</div>