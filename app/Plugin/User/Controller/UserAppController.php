<?php
class UserAppController extends AppController {	
    function beforeFilter() {
		parent::beforeFilter();
		
        $a_user = $this->Auth->user();
		if($a_user['User']['role'] != 'user') throw New NotFoundException();

		$this->set(array(
            'a_user' => $a_user
		));
    }
}
