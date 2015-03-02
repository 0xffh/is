<?php
class AdminAppController extends AppController {
    function beforeFilter() {
		parent::beforeFilter();
		
        $user = $this->Auth->user();
		if($user['User']['role'] != 'admin') throw New NotFoundException();	
    }
}