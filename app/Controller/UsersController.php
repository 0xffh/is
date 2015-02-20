<?php
class UsersController extends AppController {
	
	function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow(array('signup', 'register', 'password', 'password_reset'));
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
				$this->set(array(
					"error" => "Логін або(та) пароль не правильний(-і)",
				));
			}
		}
        
        $this->set(array(
            'page_title' => 'Вхід'
        ));
    }
    
	function register() {
		$this->layout = 'login';
		
        $this->set(array(
            'page_title' => 'Реєстрація'
        ));		
	}
	
    function signout() {
		$this->autoRender = false;

		$this->Auth->logout();
		$this->redirect($this->Auth->logoutRedirect);
	}

	function password() {
		$this->layout = 'login';
		
		if($this->request->is('post')) {
			$email = trim($this->request->data['User']['email']);
			if(empty($email)) throw new NotFoundException();

			$this->User->bindResendPassword();
			$find = $this->User->find('first',
				array(
					'conditions' => array('User.email' => $email),
					'contain' => array('ResendPassword')
				)
			);

			if(empty($find)) {
				$this->Session->setFlash("Такой пользователь не зарегистрирован", 'default', array('class' => 'alert alert-danger margin-top15'));
			} else {
				$this->SweetMailSender = $this->Components->load('SweetMailSender');

				$hash = md5(date('YmdHis').rand(1,100).Configure::read('Security.salt').microtime());

				$data = array(
					'ResendPassword' => array(
						'user_id' => $find['User']['id'],
						'hash_id' => $hash
					)
				);
				if($this->User->ResendPassword->save($data, false)) {
					$settings = array(
						'view' => 'resend_password',
						'subject' => __("Resend password"),
						'from_email' => 'password@geparda.com',
						'from_name' => 'Geparda.com',
						'data' => array(
							'hash' => $hash,
							'website' => $_SERVER['SERVER_NAME']
						)
					);

					if($this->SweetMailSender->send($email, $settings)) {
						$this->Session->setFlash("Письмо отправлено вам на почту", 'default', array('class' => 'alert alert-success'));
						$hide_form = true;
					}
				} else {
					$this->Session->setFlash("Ошибка, не получилось отправить письмо", 'default', array('class' => 'alert alert-danger margin-top15'));
				}
			}
		}

		$this->set(array(
			"page_title" => "Забули пароль?",
			"hide_form" => isset($hide_form) ? $hide_form : false
		));
	}

	function password_reset($hash = false) {
		$this->layout = 'login';
		/*
		if($hash === false) throw new NotFoundException();
		$hash = trim($hash);
		if(empty($hash)) throw new NotFoundException();

		$this->User->bindResendPassword();

		$find = $this->User->ResendPassword->findByHashId($hash);
		if(empty($find)) throw new NotImplementedException();

		if($this->request->is('post')) {
			$password = trim($this->request->data['User']['password']);
			if(empty($password) || mb_strlen($password) < 8) {
				$this->Session->setFlash("Пароль не коректний", 'default', array('class' => 'alert alert-danger margin-top15'));
			} else {
				$data = array('User' => array('password' => Security::hash($password, 'blowfish')));

				$this->User->id = $find['ResendPassword']['user_id'];
				if($this->User->save($data, false)) {
					$this->User->ResendPassword->id = $find['ResendPassword']['id'];
					$this->User->ResendPassword->delete();

					$data = $this->User->findById($this->User->id);
					unset($data['User']['password']);
					$this->Auth->login($data);
					$this->redirect('/');
				} else {
					$this->Session->setFlash("Помилка. Пароль не збережений", 'default', array('class' => 'alert alert-danger margin-top15'));
				}
			}
		}
*/
		$this->set(array(
			"page_title" => "Відновлення пароля",
		));
	}
}
