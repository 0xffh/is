<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class UsersController extends AdminAppController {
	private $roles = array('admin' => 'Адміністратор', 'moder' => 'Модератор', 'user' => 'Користувач');
	
    public function index() {
        
		$this->paginate = array(
            'limit' => 50,
            'order' => 'User.created DESC'
        );
        
        $users = $this->paginate($this->User);
        
		$this->set(array(
            'page_title' => 'Користувачі',
            'users' => $users,
            'current_nav' => '/admin/users'
		));
    }
    
	public function add() {
		$this->set(array(
            'page_title' => 'Додати користувача',
			'roles' => $this->roles,
            'current_nav' => '/admin/users'
		));
	}
    
    public function edit($id = null) {
        if($id === null) throw new NotFoundException();
		
        $user = $this->User->find('first', array(
			'contain' => 'UserInfo',
			'conditions' => array(
				'User.id' => $id
			)
		));
        if(empty($user)) throw new NotFoundException();
		
        $this->set(array(
            'page_title' => 'Редагування користувача',            
            'user' => $user,
			'roles' => $this->roles,
			'current_nav' => '/admin/users',
        ));
    }
    
	function password($id = null) {
        if($id === null) throw new NotFoundException();

        $user = $this->User->findById($id);
        if(empty($user)) throw new NotFoundException();
		
        if($this->request->is('post')) {
			$this->User->id = $id;
			
			$this->User->set($this->request->data);
			
			if($this->User->validates(array('fieldList' => array('password')))) {
				$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], 'blowfish');
				if($this->User->save($this->request->data, false)) {
					$this->Session->setFlash('Пароль оновлений', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/users');
				} else {
					$this->Session->setFlash('Помилка. Пароль не оновлений', 'flash', array('class' => 'alert-danger'));
				}
			}
        }
		
        $this->set(array(
            'page_title' => 'Редагування паролю користувача',            
            'user' => $user,
			'current_nav' => '/admin/users',
        ));
	}
	
    public function delete() {
    
    }
}