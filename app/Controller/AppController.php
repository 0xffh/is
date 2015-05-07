<?php
App::uses('Controller', 'Controller');
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
            'logoutRedirect' => '/',
            'loginRedirect' => '/',
        ),
        'Session'
    );	
	
	function beforeFilter() {		
        $this->set(array(
            'logged_in' => $this->Auth->loggedIn()
        ));
	}
}
