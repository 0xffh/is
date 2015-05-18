<div class="page-header">
    <h1><?= $page_title; ?></h1>
</div>

<div class="row">
    <div class="col-md-4 text-center">
        <?php
            if($user['UserInfo']['photo'] != null) {
                $img = '/'.$user['UserInfo']['photo'];
            } else {
                $img = '/img/users/default.png';
            }
            echo '<img src="'.$img.'" />';
            
            echo "<p class='margin-top10'><strong>".$user['UserInfo']['name']."</strong></p>";
            
            $post = $user['UserInfo']['post'];
            if(!empty($post)) echo "<p class='margin-top10'>".$post."</p>";
                
            $contact = $user['UserInfo']['contact'];	
            if(!empty($contact)) echo "<div class='margin-top10 alert alert-info'>".nl2br($contact)."</div>";
        ?>
    </div>
    <div class="col-md-8">
        <?php 
            $content = $user['UserInfo']['content'];
            if(!empty($content)) echo $content; 
        ?>
    </div>
</div>