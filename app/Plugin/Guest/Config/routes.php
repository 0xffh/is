<?php
Router::connect('/guest', array('controller' => 'pages', 'action' => 'index', 'plugin' => 'Guest'));