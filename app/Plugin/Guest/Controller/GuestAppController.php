<?php
class GuestAppController extends AppController {	
	
    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Session->setFlash('Помилка. Недостатньо прав. Зв’яжіться з адміністратором', 'flash', array('class' => 'alert-warning'));
		$this->Auth->logout();
		$this->redirect($this->Auth->logoutRedirect);
    }
}