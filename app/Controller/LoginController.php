<?php
class LoginController extends AppController {

    public function index() {
		$this->layout = 'login';
		
		$this->set(array(
			'page_title' => 'Вхід'
		));
    }
}
