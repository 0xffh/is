<div class="page-header">
	<h1><?= $page_title ?></h1>
</div>

<div class='pageConten'>
    <?php
        if(empty($news)) {
            echo $this->element('parts/nothing');
        } else {
            foreach($news as $item) {
                $date = new DateTime($item['News']['created']);
                $date_formatted = $date->format('d-m-Y');
                
                echo '
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">'.$item['News']['title'].'
                                <small>'.$date_formatted.'</small>
                            </h4>
                            '.$item['News']['description'].'
                            <a href="/news/view/'.$item['News']['slug'].'">Детальніше</a>
                        </div>
                    </div>
                ';
            }
        echo $this->element('parts/pagination');
        }
    ?>
</div>