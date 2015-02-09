<?php
class UsersController extends AppController {

    public function login() {
		$this->layout = 'login';
		
		$this->set(array(
			'page_title' => 'Вхід - ІС - НУХТ'
		));
    }
}
