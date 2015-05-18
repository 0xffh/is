<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="content-type" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <title><?php echo isset($page_title) ? $page_title : $_SERVER['SERVER_NAME']; ?></title>
        <?php
            echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min', 'style'));
            echo $this->Html->script(array('jquery-1.11.2.min', 'bootstrap.min'));
            
            if(isset($special_css)) {
                foreach($special_css as $css) echo $this->Html->css($css);
            }
        ?>
    </head>
    <body>
        <?= $this->element('parts/top-nav'); ?>
        <div class='container'>
            <div class='row content'>
                <div class='col-md-4 col-md-push-8'>
                    <?= $this->element('parts/right-panel'); ?>
                </div>
                <div class='col-md-8 col-md-pull-4'>
                    <?= $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid footer"><?= $this->element('parts/footer'); ?></div>
        <div id='up-button'><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></div>
        <?= $this->html->script('index'); ?>
    </body>
</html>