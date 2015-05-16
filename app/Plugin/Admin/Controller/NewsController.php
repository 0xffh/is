<?php
class NewsController extends AdminAppController {
	public $components = array('Admin.MyTranslate');
	
    public function index() {
        $this->paginate = array(
			'contain' => array('User' => 'UserInfo'),
            'limit' => 75,
            'order' => 'News.created DESC'
        );
		
		$news = $this->paginate($this->News);
        
		$this->set(array(
            'page_title' => 'Новини',
			'news' => $news,
			'current_nav' => '/admin/news'
		));
    }
	
	public function add() {
        if($this->request->is('post')) {
			$a_user = $this->Auth->user();
            $this->request->data['News']['user_id'] = $a_user['User']['id'];
			$this->request->data['News']['slug'] = $this->MyTranslate->toUrl($this->request->data['News']['title']).'-'.date('YmdHis');
			
            if($this->News->save($this->request->data, array('validate' => true))) {
				$last = $this->News->read(null, $this->News->id);
                $this->Session->setFlash('Новина додана. <a target="_blank" href="/news/view/'.$last['News']['slug'].'">Переглянути</a>', 'flash', array('class' => 'alert-success'));
                $this->redirect('/admin/news/edit/'.$this->News->getInsertID());
            } else {
                $this->Session->setFlash('Помилка. Новина не додана', 'flash', array('class' => 'alert-danger'));
            }
        }
        
		$_SESSION['KCFINDER']['disabled'] = false;
		
		$this->set(array(
            'page_title' => 'Додати новину',
			'current_nav' => '/admin/news'
		));
	}
	
	public function edit($id = null) {
		if($id === null) throw new NotFoundException();
		
        $news = $this->News->findById($id);
        if(empty($news)) throw new NotFoundException();
		
        if($this->request->is('post')) {
            $this->News->isUpdate = $id;
            $this->News->id = $id;
			
			$a_user = $this->Auth->user();
            $this->request->data['News']['user_id'] = $a_user['User']['id'];
			
            if($this->News->save($this->request->data, true)) {
				$last = $this->News->read(null, $this->News->id);
                $this->Session->setFlash('Новина оновлена. <a target="_blank" href="/news/view/'.$last['News']['slug'].'">Переглянути</a>', 'flash', array('class' => 'alert-success'));
				$this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Новина не оновлена', 'flash', array('class' => 'alert-danger'));
            }
        }
		
		$_SESSION['KCFINDER']['disabled'] = false;
		
		$this->set(array(
            'page_title' => 'Редагувати новину',
			'news' => $news,
			'current_nav' => '/admin/news'
		));
	}
	
	public function delete($id = null) {
        $this->autoRender = false;
        
        if($id === null) throw new NotFoundException();

        $news = $this->News->findById($id);
        if(empty($news)) throw new NotFoundException();

        if($this->News->delete($id)) {
            $this->Session->setFlash('Новина видалена', 'flash', array('class' => 'alert-success'));
            $this->redirect('/admin/news');
        } else {
            $this->Session->setFlash('Помилка. Новина не видалена', 'flash', array('class' => 'alert-danger'));
        }
	}
}