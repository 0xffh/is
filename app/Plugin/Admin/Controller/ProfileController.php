<?php
class ProfileController extends AdminAppController {
	public $uses = array('Admin.User');
	public $components = array('Admin.MyMadImage');
	
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

        $user = $this->User->findById($a_user['User']['id']);
        if(empty($user)) throw new NotFoundException();

		$base_dir = WWW_ROOT.'img'.DS.'users'.DS.$user['User']['hash_id'];

		if($this->request->is('post')) {
			if(array_key_exists('upload', $this->request->data)) {
				if($this->MyMadImage->upload($_FILES, array('folder' => $base_dir))) {
					$this->Session->setFlash('Файл загружен', 'flash', array('class' => 'alert-success'));
					$this->redirect($this->here);
				} else {
					$this->Session->setFlash('Ошибка. Файл не загружен', 'flash', array('class' => 'alert-danger'));
				}
			} else if(array_key_exists('crop', $this->request->data)) {
				if($service['Service']['image_url'] !== null) {

					$options = array();
					foreach($this->request->data as $name => $val) $options[$name] = $val;
					$options['base_dir'] = $base_dir;

					$res = $this->MyMadImage->cropImage($service['Service']['image_url'], $options);
					if(!empty($res)) {
						$this->Service->id = $id;
						$this->Service->saveField('image_url', str_replace(DS, '/', $res));

						$this->Session->setFlash('Превью загружена', 'flash', array('class' => 'alert-success'));
						$this->clearCache("service*", "default");
						$this->redirect($this->here);
					}
				}
			}
		}
		
		$this->set(array(
            'page_title' => 'Редагування фотографії',
			'current_nav' => '/profile',
			'special_css' => array('/admin/css/jcrop/css/jquery.Jcrop')
		));
    }
	
    public function files() {
		$this->set(array(
            'page_title' => 'Файли',
			'current_nav' => '/profile',
		));
    }
}