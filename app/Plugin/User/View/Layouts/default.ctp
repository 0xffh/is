<!DOCTYPE html>
<html>
    <head>
        <title><?php echo isset($page_title) ? $page_title : $_SERVER['SERVER_NAME']; ?></title>
        <?php
            echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min', '/user/css/style'));
            echo $this->Html->script(array('jquery-1.11.2.min', 'bootstrap.min'));
            
            if(isset($special_css)) {
                foreach($special_css as $css) echo $this->Html->css($css);
            }
        ?>
        <script type='text/javascript'>
            function Gv() {}
            var globalVars = new Gv();
        </script>
    </head>
    <body>
        <div class='container margin-top30'>
            <?php
                if($logged_in) echo $this->element('parts/nav');
                echo $this->fetch('content');
            ?>
        </div>
    </body>
</html>