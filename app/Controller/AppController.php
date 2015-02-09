<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
    
    public $components = array('MyMenu');

    function beforeFilter() {
        $this->set(array(
			'main_menu' => $this->MyMenu->getMenu('main'),
        ));
    }
}
