<?php
class ReviewsController extends AdminAppController {
	public function index() {
        $this->paginate = array(
			'contain' => array('User' => 'UserInfo'),
            'limit' => 50,
            'order' => 'Review.modified DESC'
        );
		
		$reviews = $this->paginate($this->Review);
        
		$this->set(array(
            'page_title' => 'Керування відгуками',
            'reviews' => $reviews,
			'current_nav' => '/admin/reviews',
		));
	}
    
	public function edit($id = null) {
		if($id === null) throw new NotFoundException();
		
        $review = $this->Review->findById($id);
        if(empty($review)) throw new NotFoundException();
		
        if($this->request->is('post')) {
            $this->Review->id = $id;
			
			$a_user = $this->Auth->user();
            $this->request->data['Review']['user_id'] = $a_user['User']['id'];
			
            if($this->Review->save($this->request->data, true)) {
                $this->Session->setFlash('Відгук оновлений', 'flash', array('class' => 'alert-success'));
				$this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Відгук не оновлений', 'flash', array('class' => 'alert-danger'));
            }
        }
		
		$_SESSION['KCFINDER']['disabled'] = false;
		
		$this->set(array(
            'page_title' => 'Редагувати відгук',
			'review' => $review,
			'current_nav' => '/admin/reviews'
		));
	}
    
    public function changestatus($id = null) {
        $this->autoRender = false;
        
        if($id === null) throw new NotFoundException();

        $review = $this->Review->findById($id);
        if(empty($review)) throw new NotFoundException();
        
        $this->Review->id = $id;
        $this->request->data['Review']['published'] = $review['Review']['published'] ? 0 : 1;
        
        $a_user = $this->Auth->user();
        $this->request->data['Review']['user_id'] = $a_user['User']['id'];
        
        if($this->Review->save($this->request->data, false)) {
            $this->Session->setFlash('Відгук оновлений', 'flash', array('class' => 'alert-success'));
        } else {
            $this->Session->setFlash('Помилка. Відгук не оновлений', 'flash', array('class' => 'alert-danger'));
        }
        $this->redirect('/admin/reviews');
    }
    
	public function delete($id = null) {
        $this->autoRender = false;
        
        if($id === null) throw new NotFoundException();

        $review = $this->Review->findById($id);
        if(empty($review)) throw new NotFoundException();

        if($this->Review->delete($id)) {
            $this->Session->setFlash('Відгук видалений', 'flash', array('class' => 'alert-success'));
            $this->redirect('/admin/reviews');
        } else {
            $this->Session->setFlash('Помилка. Відгук не видалений', 'flash', array('class' => 'alert-danger'));
        }
	}
}