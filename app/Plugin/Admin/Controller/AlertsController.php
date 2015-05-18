<?php
class AlertsController extends AdminAppController {
    private $types = array(
        'panel-default' => 'Звичайне (білий)',
        'panel-primary' => 'Головне (синій)',
        'panel-success' => 'Успішне (зелений)',
        'panel-info' => 'Інформаційне (голубий)',
        'panel-warning' => 'Попередження (світло-коричневий)',
        'panel-danger' => 'Небезпека (червоний)'
    );
    
    public function index() {
        $this->paginate = array(
			'contain' => array('User' => 'UserInfo'),
            'limit' => 50,
            'order' => 'Alert.created DESC, Alert.published DESC'
        );
		
		$alerts = $this->paginate($this->Alert);
        
		$this->set(array(
            'page_title' => 'Оголошення',
            'types' => $this->types,
			'alerts' => $alerts,
			'current_nav' => '/admin/alerts'
		));
    }
    
    public function add() {
        if($this->request->is('post')) {
			$a_user = $this->Auth->user();
            $this->request->data['Alert']['user_id'] = $a_user['User']['id'];
			
            if($this->Alert->save($this->request->data, array('validate' => true))) {
                $this->Session->setFlash('Оголошення додано', 'flash', array('class' => 'alert-success'));
                $this->redirect('/admin/alerts/edit/'.$this->Alert->getInsertID());
            } else {
                $this->Session->setFlash('Помилка. Оголошення не додано', 'flash', array('class' => 'alert-danger'));
            }
        }
		
		$this->set(array(
            'page_title' => 'Додати оголошення',
            'types' => $this->types,
			'current_nav' => '/admin/alerts'
		));
    }
    
    public function edit($id = null) {
		if($id === null) throw new NotFoundException();
		
        $alert = $this->Alert->findById($id);
        if(empty($alert)) throw new NotFoundException();
		
        if($this->request->is('post')) {
            $this->Alert->id = $id;
			
			$a_user = $this->Auth->user();
            $this->request->data['Alert']['user_id'] = $a_user['User']['id'];
			
            if($this->Alert->save($this->request->data, true)) {
                $this->Session->setFlash('Оголошення оновлене', 'flash', array('class' => 'alert-success'));
				$this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Оголошення не оновлене', 'flash', array('class' => 'alert-danger'));
            }
        }
		
		$this->set(array(
            'page_title' => 'Редагувати оголошення',
			'alert' => $alert,
            'types' => $this->types,
			'current_nav' => '/admin/alerts'
		));
    }
    
    public function changestatus($id = null) {
        $this->autoRender = false;
        
        if($id === null) throw new NotFoundException();

        $alert = $this->Alert->findById($id);
        if(empty($alert)) throw new NotFoundException();
        
        $this->Alert->id = $id;
        $this->request->data['Alert']['published'] = $alert['Alert']['published'] ? 0 : 1;
        
        $a_user = $this->Auth->user();
        $this->request->data['Alert']['user_id'] = $a_user['User']['id'];
        
        if($this->Alert->save($this->request->data, false)) {
            $this->Session->setFlash('Оголошення оновлене', 'flash', array('class' => 'alert-success'));
        } else {
            $this->Session->setFlash('Помилка. Оголошення не оновлене', 'flash', array('class' => 'alert-danger'));
        }
        $this->redirect('/admin/alerts');
    }
    
    public function delete($id = null) {
        $this->autoRender = false;
        
        if($id === null) throw new NotFoundException();

        $alert = $this->Alert->findById($id);
        if(empty($alert)) throw new NotFoundException();

        if($this->Alert->delete($id)) {
            $this->Session->setFlash('Оголошення видалене', 'flash', array('class' => 'alert-success'));
            $this->redirect('/admin/alerts');
        } else {
            $this->Session->setFlash('Помилка. Оголошення не видалене', 'flash', array('class' => 'alert-danger'));
        }
    }
}