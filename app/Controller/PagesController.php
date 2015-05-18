<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {
	public $uses = array('Page', 'User', 'Alert');

	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow(array('homepage', 'view'));
	}

	public function homepage() {
		$this->layout = 'homepage';
		
		$main = $this->Page->findBySlug('main');
		$alerts = $this->Alert->find('all', array(
			'conditions' => array(
				'Alert.published' => 1
			),
			'order' => 'Alert.created DESC'
		));
		
		$this->set(array(
			'page_title' => 'Кафедра інформаційних систем',
			'main' => $main,
			'alerts' => $alerts
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
