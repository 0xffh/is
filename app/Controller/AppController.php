<?php
App::uses('Controller', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class AppController extends Controller {
    public $components = array(
        'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'login', 'password' => 'password'),					
                    'passwordHasher' => 'blowfish'
				),				
			),
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'logoutRedirect' => '/users/login',
            'loginRedirect' => '/',
        ),
        'Session', 'MyMenu'
    );	
	
	function beforeFilter() {
		$this->MyMenu = $this->Components->load('MyMenu');
		
        $this->set(array(
            'logged_in' => $this->Auth->loggedIn(),
			'main_menu' => $this->MyMenu->getMenu('main'),
        ));
	}
}
