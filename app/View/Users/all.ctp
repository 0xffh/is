<div class="page-header">
    <h1><?= $page_title; ?></h1>
</div>

<div class='pageContent users'>
    <?php 
        if(empty($users)) {
            echo $this->element('parts/nothing');
        } else {
            foreach($users as $item) {
                if($item['UserInfo']['photo'] != null) {
                    $img = '/'.$item['UserInfo']['photo'];
                } else {
                    $img = '/img/users/default.png';
                }
                
                echo '
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="thumbnail">
                            <img src="'.$img.'" />
                            <div class="caption text-center">										
                                <p><a href="/users/view/'.$item['User']['hash_id'].'">'.$item['UserInfo']['name'].'</a></p>
                                <p>'.$item['UserInfo']['post'].'</p>
                            </div>
                        </div>							
                    </div>
                ';
            }
        }
    ?>
</div>