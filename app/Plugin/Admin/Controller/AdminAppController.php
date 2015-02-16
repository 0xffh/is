<?php
class AdminAppController extends AppController {	
    public $components = array(
        'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'login', 'password' => 'password'),
                    'passwordHasher' => 'Blowfish'
				),				
			),
            'loginAction' => array(
                'controller' => 'login',
                'action' => 'index',
                'plugin' => 'admin'
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
