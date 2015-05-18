<?php
class ProfileController extends UserAppController {
	public $uses = array('User.User', 'User.UserInfo');
	public $components = array('User.MyMadImage');
	
    public function index() {
		$a_user = $this->Auth->user();
		
        $user = $this->User->find('first', array(
			'contain' => 'UserInfo',
			'conditions' => array(
				'User.id' => $a_user['User']['id']
			)
		));
        if(empty($user)) throw new NotFoundException();
		
        if($this->request->is('post')) {
            $this->User->UserInfo->id = $user['UserInfo']['id'];

            $this->User->UserInfo->set($this->request->data);
			
            if($this->User->UserInfo->validates(array('fieldList' => array('email')))) {
                if($this->User->UserInfo->save($this->request->data, false)) {
                    $this->Session->setFlash('Профіль оновлений', 'flash', array('class' => 'alert-success'));
                    $this->redirect($this->here);
                } else {
                    $this->Session->setFlash('Помилка. Профіль не оновлений', 'flash', array('class' => 'alert-danger'));
                }
            }
        }
		
		$_SESSION['KCFINDER']['disabled'] = false;
		
		$this->set(array(
            'page_title' => 'Редагування особистої інформації',
            'user' => $user,
			'current_nav' => '/profile',
		));
    }
	
    public function photo() {
		$a_user = $this->Auth->user();
		
        $user_info = $this->UserInfo->find('first', array(
			'fields' => array('UserInfo.id', 'UserInfo.photo'),
			'conditions' => array(
				'UserInfo.user_id' => $a_user['User']['id']
			)
		));
        if(empty($user_info)) throw new NotFoundException();
		
		$base_dir = 'img'.DS.'users';

		if($this->request->is('post')) {
			if(array_key_exists('upload', $this->request->data)) {
				if($this->MyMadImage->upload($_FILES, array('folder' => $base_dir))) {
					$res = $this->MyMadImage->getResult();
					
					if($user_info['UserInfo']['photo'] != null) {
						unlink($user_info['UserInfo']['photo']);
					}
					
					$this->UserInfo->id = $user_info['UserInfo']['id'];
					$this->UserInfo->saveField('photo', str_replace(DS, '/', $res['result_urls'][0]));

					$this->Session->setFlash('Фото завантажено', 'flash', array('class' => 'alert-success'));
				} else {
					$this->Session->setFlash('Помилка. Фото не завантажено', 'flash', array('class' => 'alert-danger'));
				}
			} else if(array_key_exists('crop', $this->request->data)) {
				if($user_info['UserInfo']['photo'] !== null) {

					$options_crop = array();
					foreach($this->request->data as $name => $val) $options_crop[$name] = $val;
					$options_crop['base_dir'] = $base_dir;
					
					$res_crop = $this->MyMadImage->cropImage($user_info['UserInfo']['photo'], $options_crop);
					$res = $this->MyMadImage->makeThumb($res_crop, array('dw' => 220));
					
					if(!empty($res)) {
						$this->UserInfo->id = $user_info['UserInfo']['id'];
						$this->UserInfo->saveField('photo', str_replace(DS, '/', $res));

						$this->Session->setFlash('Мініатюра створена', 'flash', array('class' => 'alert-success'));
					}
				}
			}
			$this->redirect($this->here);
		}
		
		$this->set(array(
            'page_title' => 'Редагування фотографії',
			'current_nav' => '/profile',
			'user_info' => $user_info,
			'special_css' => array('jcrop/css/jquery.Jcrop')
		));
    }
	
	function password() {
		$a_user = $this->Auth->user();
		
        $user = $this->User->find('first', array(
			'contain' => 'UserInfo',
			'conditions' => array(
				'User.id' => $a_user['User']['id']
			)
		));
        if(empty($user)) throw new NotFoundException();
		
        if($this->request->is('post')) {
			$this->User->id = $a_user['User']['id'];
			
			$this->User->set($this->request->data);
			
			if($this->User->validates(array('fieldList' => array('password')))) {
				$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], 'blowfish');
				if($this->User->save($this->request->data, false)) {
					$this->Session->setFlash('Пароль оновлений', 'flash', array('class' => 'alert-success'));
					$this->redirect('/user/profile/password');
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
}