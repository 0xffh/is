<?php
class PagesController extends AdminAppController {
    public function index() {
		$this->set(array(
            'user' => $this->Auth->user(),
			'page_title' => 'Панель адміністратора'
		));
    }
    
    public function all() {
        
    }

    public function add() {
        
    }
}