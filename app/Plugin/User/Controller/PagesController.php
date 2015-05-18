<?php
class PagesController extends UserAppController {
	public $components = array('User.MyTranslate');
	
    public function index() {
		$this->set(array(
            'page_title' => 'Панель користувача'
		));
    }
	
    public function all() {
		$a_user = $this->Auth->user();
		
        $this->paginate = array(
			'conditions' => array('Page.user_id' => $a_user['User']['id']),
			'contain' => array('User' => 'UserInfo'),
            'limit' => 75,
            'order' => 'Page.modified DESC'
        );
		
		$pages = $this->paginate($this->Page);
		
		$this->set(array(
            'page_title' => 'Всі сторінки',
			'pages' => $pages,
			'current_nav' => '/user/pages/all'
		));
    }
	
	public function add() {
        if($this->request->is('post')) {
			$a_user = $this->Auth->user();
            $this->request->data['Page']['user_id'] = $a_user['User']['id'];
			$this->request->data['Page']['slug'] = $this->MyTranslate->toUrl($this->request->data['Page']['title']);
			
            if($this->Page->save($this->request->data, array('validate' => true))) {
				$last = $this->Page->read(null, $this->Page->id);
                $this->Session->setFlash('Сторінка додана. <a target="_blank" href="/pages/view/'.$last['Page']['slug'].'">Переглянути</a>', 'flash', array('class' => 'alert-success'));
                $this->redirect('/user/pages/edit/'.$this->Page->getInsertID());
            } else {
                $this->Session->setFlash('Помилка. Сторінка не додана', 'flash', array('class' => 'alert-danger'));
            }
        }
		
		$_SESSION['KCFINDER']['disabled'] = false;
		
		$this->set(array(
            'page_title' => 'Додати сторінку',
			'current_nav' => '/user/pages/all'
		));
	}
	
	public function edit($id = null) {
		if($id === null) throw new NotFoundException();
		
		$a_user = $this->Auth->user();
		
        $page = $this->Page->find('first', array(
			'conditions' => array(
				'Page.id' => $id,
				'Page.user_id' => $a_user['User']['id']
			)
		));
        if(empty($page)) throw new NotFoundException();
		
        if($this->request->is('post')) {
            $this->Page->isUpdate = $id;
            $this->Page->id = $id;
			
			$a_user = $this->Auth->user();
            $this->request->data['Page']['user_id'] = $a_user['User']['id'];
			
            if($this->Page->save($this->request->data, true)) {
				$last = $this->Page->read(null, $this->Page->id);
                $this->Session->setFlash('Сторінка оновлена. <a target="_blank" href="/pages/view/'.$last['Page']['slug'].'">Переглянути</a>', 'flash', array('class' => 'alert-success'));
				$this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Сторінка не оновлена', 'flash', array('class' => 'alert-danger'));
            }
        }
		
		$_SESSION['KCFINDER']['disabled'] = false;
		
		$this->set(array(
            'page_title' => 'Редагувати сторінку',
			'page' => $page,
			'current_nav' => '/user/pages/all'
		));
	}
	
	public function delete($id = null) {
        $this->autoRender = false;
        
        if($id === null) throw new NotFoundException();

		$a_user = $this->Auth->user();
		
        $page = $this->Page->find('first', array(
			'conditions' => array(
				'Page.id' => $id,
				'Page.user_id' => $a_user['User']['id']
			)
		));
        if(empty($page)) throw new NotFoundException();

        if($this->Page->delete($id)) {
            $this->Session->setFlash('Сторінка видалена', 'flash', array('class' => 'alert-success'));
            $this->redirect('/user/pages/all');
        } else {
            $this->Session->setFlash('Помилка. Сторінка не видалена', 'flash', array('class' => 'alert-danger'));
        }
	}
}