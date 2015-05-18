<?php
class NewsController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow(array('index', 'view'));
	}

	public function index() {
		$this->paginate = array(
			'conditions' => array(
				'News.published' => 1
			),
            'limit' => 15,
            'order' => 'News.created DESC'
		);
		
		$news = $this->paginate($this->News);
		
		$this->set(array(
			'page_title' => 'Новини',
			'news' => $news
		));
	}
	
	public function view($slug = null) {
		if($slug === null) throw new NotFoundException();
		
        $news = $this->News->find('first', array(
			'conditions' => array(
				'News.slug' => $slug,
				'News.published' => 1
			)
		));
        if(empty($news)) throw new NotFoundException();
		
		$this->set(array(
			'page_title' => $news['News']['title'],
			'news' => $news
		));
	}
}
