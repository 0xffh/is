<?php
class ReviewsController extends AppController {
    public function index() {
        if($this->request->is('post')) {
            if($this->Review->save($this->request->data, array('validate' => true))) {
                $this->Session->setFlash('Відгук доданий', 'flash', array('class' => 'alert-success'));
                $this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Відгук не доданий', 'flash', array('class' => 'alert-danger'));
            }
        }
        
		$this->set(array(
			'page_title' => 'Додати відгук',
		));
    }
    
	public function all() {
		$this->paginate = array(
			'conditions' => array(
				'Review.published' => 1
			),
            'limit' => 20,
            'order' => 'Review.created DESC'
		);
		
		$reviews = $this->paginate($this->Review);
		
		$this->set(array(
			'page_title' => 'Всі відгуки',
			'reviews' => $reviews
		));
	}
}