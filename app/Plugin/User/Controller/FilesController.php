<?php
class FilesController extends UserAppController {
	public $components = array('User.MyTranslate');
	
    public function index() {
		$a_user = $this->Auth->user();
		
		$this->paginate = array(
			'conditions' => array(
				'File.user_id' => $a_user['User']['id']
			),
            'limit' => 50,
            'order' => 'File.modified DESC'
        );
		
		$files = $this->paginate($this->File);
		
		$this->set(array(
            'page_title' => 'Файли користувача',
			'files' => $files,
			'current_nav' => '/user/files'
		));
    }
	
    public function add() {
		$a_user = $this->Auth->user();
		
		if($this->request->is('post')) {
			header("Content-Type: text/html; charset=utf-8");

			if(!empty($this->request->form['file']['tmp_name']) && is_uploaded_file($this->request->form['file']['tmp_name'])) {
				$folder = $a_user['User']['hash_id'];
				$uploaddir = 'files/users/'.$folder.'/';
				$filename = $this->MyTranslate->it(basename($this->request->form['file']['name']));

				$this->request->data['File']['user_id'] = $a_user['User']['id'];
				$this->request->data['File']['slug'] = $filename;
				
				if($this->File->save($this->request->data, array('validate' => 'true')) && move_uploaded_file($this->request->form['file']['tmp_name'], $uploaddir.$filename)) {
					$this->Session->setFlash('Файл успішно завантажений', 'flash', array('class' => 'alert-success'));
					$this->redirect($this->here);
				} else {
					$this->Session->setFlash('Помилка. Файл не завантажений', 'flash', array('class' => 'alert-danger'));
				}
					
			} else {
				$this->Session->setFlash('Помилка. Файл не завантажений', 'flash', array('class' => 'alert-danger'));
			}
		}
		
		$this->set(array(
            'page_title' => 'Додати файл',
			'a_user' => $a_user,
			'current_nav' => '/profile'
		));
    }
	
    public function edit($id = null) {
		if($id === null) throw new NotFoundException();
		
		$a_user = $this->Auth->user();
		
		$file = $this->File->find('first', array(
			'conditions' => array(
				'File.user_id' => $a_user['User']['id'],
				'File.id' => $id
			)
		));
		if(empty($file)) throw new NotFoundException();
		
        if($this->request->is('post')) {
            $this->File->id = $id;

            $this->File->set($this->request->data);    

            if($this->File->validates(array('fieldList' => array('title', 'info')))) {
                if($this->File->save($this->request->data, false)) {
                    $this->Session->setFlash('Файл оновлений', 'flash', array('class' => 'alert-success'));
                    $this->redirect($this->here);
                } else {
                    $this->Session->setFlash('Помилка. Файл не оновлений', 'flash', array('class' => 'alert-danger'));
                }
            }
        }
		
		$this->set(array(
            'page_title' => 'Редагувати файл',
			'file' => $file,
			'current_nav' => '/profile'
		));
    }
	
    public function delete($id = null) {
		$this->autoRender = false;
		
		if($id === null) throw new NotFoundException();
		
		$a_user = $this->Auth->user();
		
		$file = $this->File->find('first', array(
			'conditions' => array(
				'File.user_id' => $a_user['User']['id'],
				'File.id' => $id
			)
		));
		if(empty($file)) throw new NotFoundException();
		
        if($this->File->delete($id) && unlink(WWW_ROOT.'files/users/'.$a_user['User']['hash_id'].'/'.$file['File']['slug'])) {
            $this->Session->setFlash('Файл видалений', 'flash', array('class' => 'alert-success'));
            $this->redirect('/user/files');
        } else {
            $this->Session->setFlash('Помилка. Файл не видалений', 'flash', array('class' => 'alert-danger'));
        }
    }
}