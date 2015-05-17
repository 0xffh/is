<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {
	public $uses = array('Page', 'User');

	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow(array('homepage', 'view'));
	}

	public function homepage() {
		$this->set(array(
			'page_title' => 'Кафедра інформаційних систем',
		));
	}
	
	public function view($slug = null) {
		if($slug === null) throw new NotFoundException();
		
        $page = $this->Page->find('first', array(
			'contain' => array('User' => 'UserInfo'),
			'conditions' => array(
				'Page.slug' => $slug
			)
		));
        if(empty($page)) throw new NotFoundException();
		
		$this->set(array(
			'page_title' => $page['Page']['title'],
			'page' => $page
		));
	}
}
