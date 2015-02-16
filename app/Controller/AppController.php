<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
    
    public $components = array(
        'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'login', 'password' => 'password'),
					'passwordHasher' => 'Blowfish',
				),
			),
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'logoutRedirect' => '/',
            'loginRedirect' => '/',
        ),
        'MyMenu'
    );

    function beforeFilter() {
        $this->set(array(
            /*'user' => $this->Auth->user(),*/
			'main_menu' => $this->MyMenu->getMenu('main'),
        ));
    }
}
