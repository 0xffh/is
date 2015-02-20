<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
    
    public $components = array(
        'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'login', 'password' => 'password'),
					'passwordHasher' => 'blowfish',
				),
			),
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'logoutRedirect' => '/users/login',
            'loginRedirect' => '/',
        ),
        'MyMenu', 'Session'
    );

    function beforeFilter() {
        $this->set(array(
			'main_menu' => $this->MyMenu->getMenu('main'),
        ));
    }
}
