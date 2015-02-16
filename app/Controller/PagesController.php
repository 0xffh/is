<?php
class PagesController extends AppController {

	function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow(array('index'));
	}
	
    public function index() {
		$this->set(array(
			'page_title' => 'Кафедра інформаційних систем'
		));
    }
}
