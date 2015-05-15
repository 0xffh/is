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
        if($this->request->is('post')) {
            if($this->User->saveAll($this->request->data, array('validate' => 'only'))) {
                $this->request->data['User']['hash_id'] = md5(date('YmdHis').rand(1, 1000).Configure::read('Security.salt'));
				$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], 'blowfish');
				$this->request->data['UserInfo']['user_id'] = $this->User->id;
				
				if($this->User->saveAssociated($this->request->data, array('validate' => false))) {
					$last = $this->User->read(null, $this->User->id);
					if(new Folder(WWW_ROOT.'files'.DS.'users'.DS.$last['User']['hash_id'], true, 0755)) {
						$this->Session->setFlash('Користувач зареєстрований', 'flash', array('class' => 'alert-success'));
						$this->redirect('/admin/users/edit/'.$this->User->getInsertID());
					} else {
						$this->Session->setFlash('Помилка. Папка користувача не створена', 'flash', array('class' => 'alert-danger'));
					}
                } else {
                    $this->Session->setFlash('Помилка. Користувач не зареєстрований', 'flash', array('class' => 'alert-danger'));
                }
            } else {
				$this->Session->setFlash('Помилка. Користувач не зареєстрований', 'flash', array('class' => 'alert-danger'));
            }
		}
		
		$_SESSION['KCFINDER']['disabled'] = false;
		
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
		
        if($this->request->is('post')) {
            $this->User->id = $id;
            $this->User->UserInfo->id = $user['UserInfo']['id'];

            $this->User->set($this->request->data);
            $this->User->UserInfo->set($this->request->data);            

            if($this->User->UserInfo->validates(array('fieldList' => array('email')))) {
                if($this->User->save($this->request->data, false) && $this->User->UserInfo->save($this->request->data, false)) {
                    $this->Session->setFlash('Користувач оновлений', 'flash', array('class' => 'alert-success'));
                    $this->redirect($this->here);
                } else {
                    $this->Session->setFlash('Помилка. Користувач не оновлений', 'flash', array('class' => 'alert-danger'));
                }
            }
        }
		
		$_SESSION['KCFINDER']['disabled'] = false;
		
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
	
    public function delete($id = null) {
        $this->autoRender = false;
        
        if($id === null) throw new NotFoundException();

        $user = $this->User->findById($id);
        if(empty($user)) throw new NotFoundException();

        if($this->User->delete($id)) {
            $this->Session->setFlash('Користувач видалений', 'flash', array('class' => 'alert-success'));
            $this->redirect('/admin/users');
        } else {
            $this->Session->setFlash('Помилка. Користувач не видалений', 'flash', array('class' => 'alert-danger'));
        }
    }
}