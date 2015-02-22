<?php
class UsersController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow(array('login', 'register'));
	}
	
    function login() {
        $this->layout = 'login';
		
		if($this->request->is('post')) {
			$data = $this->User->find('first',
				array(
					'recursive' => 1,
					'conditions' => array('User.login' => $this->request->data['User']['login']),
				)
			);
			
			if(!empty($data)){
				if($this->Auth->login()) {
					unset($data['User']['password']);
					$this->Auth->login($data);
					
					switch($data['User']['role']) {
						case 'guest' :
							$this->redirect('/guest');
						break;
						case 'user' :
							$this->redirect('/user');
						break;
						case 'moder' :
							$this->redirect('/moder');
						break;
						case 'admin' :
							$this->redirect('/admin');
						break;
					}
				} else {
					$this->Session->setFlash('Помилка. Логін або(та) пароль не правильний(-і)', 'flash', array('class' => 'alert-danger'));
				}
			} else {
				$this->Session->setFlash('Помилка. Логін або(та) пароль не правильний(-і)', 'flash', array('class' => 'alert-danger'));
			}
		}
        
        $this->set(array(
            'page_title' => 'Вхід'
        ));
    }
    
	function register() {
		$this->layout = 'login';
		
        if($this->request->is('post')) {
            if($this->User->saveAll($this->request->data, array('validate' => 'only'))) {
                $this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], 'blowfish');
                $this->request->data['UserInfo']['user_id'] = $this->User->id;
				
				if($this->User->saveAssociated($this->request->data, array('validate' => false))) {
                    $this->Session->setFlash('Користувач зареєстрований', 'flash', array('class' => 'alert-success'));
                    $this->redirect('/users/login');
                } else {
                    $this->Session->setFlash('Помилка. Користувач не зареєстрований', 'flash', array('class' => 'alert-danger'));
                }
            } else {
				$this->Session->setFlash('Виникла непередбачувана помилка', 'flash', array('class' => 'alert-danger'));
            }
		}

        $this->set(array(
            'page_title' => 'Реєстрація'
        ));		
	}
	
    function logout() {
		$this->autoRender = false;

		$this->Auth->logout();
		$this->redirect($this->Auth->logoutRedirect);
	}
}