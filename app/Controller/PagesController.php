<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public function index() {
		$this->set(array(
			'page_title' => 'Кафедра інформаційних систем - НУХТ'
		));
    }
}
