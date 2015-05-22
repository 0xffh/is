<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {
	public $uses = array('Page', 'News', 'User', 'Alert');

	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow(array('homepage', 'view'));
	}

	public function homepage() {
		$this->layout = 'homepage';
		
		$this->paginate = array(
			'conditions' => array(
				'News.published' => 1
			),
            'limit' => 5,
            'order' => 'News.created DESC'
		);
		$news = $this->paginate($this->News);
		
		$alerts = $this->Alert->find('all', array(
			'conditions' => array(
				'Alert.published' => 1
			),
			'order' => 'Alert.created DESC'
		));
		
		$this->set(array(
			'page_title' => 'Кафедра інформаційних систем',
			'news' => $news,
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
