<?php
class PagesController extends AdminAppController {
	public $components = array('Admin.MyTranslate');
	
    public function index() {
		$this->set(array(
            'page_title' => 'Панель адміністратора'
		));
    }
	
    public function all() {
        $this->paginate = array(
            'limit' => 75,
            'order' => 'Page.modified DESC'
        );
		
		$pages = $this->paginate($this->Page);
		
		$this->set(array(
            'page_title' => 'Всі сторінки',
			'pages' => $pages,
			'current_nav' => '/admin/pages/all'
		));
    }
	
	public function add() {
        if($this->request->is('post')) {
			$a_user = $this->Auth->user();
            $this->request->data['Page']['user_id'] = $a_user['User']['id'];
			$this->request->data['Page']['slug'] = $this->MyTranslate->toUrl($this->request->data['Page']['title'])'-'.date('YmdHis');
			
            if($this->Page->save($this->request->data, array('validate' => true))) {
				$last = $this->Page->read(null, $this->Page->id);
                $this->Session->setFlash('Сторінка додана. <a target="_blank" href="/pages/view/'.$last['Page']['slug'].'">Переглянути</a>', 'flash', array('class' => 'alert-success'));
                $this->redirect('/admin/pages/edit/'.$this->Page->getInsertID());
            } else {
                $this->Session->setFlash('Помилка. Сторінка не додана', 'flash', array('class' => 'alert-danger'));
            }
        }
		
		$this->set(array(
            'page_title' => 'Додати сторінку',
			'current_nav' => '/admin/pages/all'
		));
	}
	
	public function edit() {
		
		$this->set(array(
            'page_title' => 'Редагувати сторінку',
			'current_nav' => '/admin/pages/all'
		));
	}
}