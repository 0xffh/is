<?php
class LoginController extends AdminAppController {
	public $uses = array('Admin.User');
	
    function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->allow(array('index', 'register', 'password'));
    }
	
    public function index() {
		/*
        Security::setHash('blowfish');
		$hash = Security::hash('12345abc');         
        
        $data = array(
            'login' => 'admin@is',
            'password' => $hash
        );
        
        $this->User->save($data, false);*/
        if($this->request->is('post')) {
            $res = $this->Auth->login();
            $error = !$res;
            
            if($res) {
                $this->redirect($this->Auth->redirect());
            }
        }
        
		$this->set(array(
			'error' => isset($error) ? $error : false,
			'page_title' => 'Вхід'
		));
    }
	
    public function register() {		
		$this->set(array(
			'page_title' => 'Реєстрація'
		));
    }
	
    public function password() {
		$this->set(array(
			'page_title' => 'Забули пароль?'
		));
    }
}
