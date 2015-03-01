<?php
class NavsController extends AdminAppController {
    public $uses = array('Admin.Nav');
    
    function index() {
        $navs = $this->Nav->find('all');

        $this->set(array(
            'page_title' => 'Меню',
            'navs' => $navs,
            'current_nav' => '/navs'
        ));
    }
    
    function add() {
        if($this->request->is('post')) {
            if($this->Nav->save($this->request->data, true, array('key', 'name'))) {
                $this->Session->setFlash('Меню додано', 'flash', array('class' => 'alert-success'));
                $this->clearCache("nav*", "default");
                $this->redirect('/admin/navs/edit/'.$this->Nav->getInsertID());
            } else {
                $this->Session->setFlash('Помилка. Меню не додано', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $navs = $this->Nav->find('all');
        
        $this->set(array(
            'page_title' => 'Додати меню',
            'navs' => $navs,
            'current_nav' => '/navs'
        ));
    }
    
    function edit($id = false) {
        if($id === false) throw new NotFoundException();
        $id = (int) $id;
        
        $nav = $this->Nav->find('first',
            array(
                'conditions' => array('Nav.id' => $id)
            )
        );
        if(empty($nav)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Nav->isUpdate = $id;
            $this->Nav->id = $id;            
            
            if($this->Nav->save($this->request->data, true, array('key', 'name'))) {
                $this->Session->setFlash('Меню оновлено', 'flash', array('class' => 'alert-success'));
                $this->clearCache("nav*", "default");
                $this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Меню не оновлено', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $this->set(array(
            'page_title' => 'Редагування меню',
            'nav' => $nav,
            'current_nav' => '/navs'
        ));
    }
    
    function delete($id) {
        if($this->Nav->delete($id)) {
            $this->Session->setFlash('Меню видалено', 'flash', array('class' => 'alert-success'));
            $this->clearCache("nav*", "default");
            $this->redirect('/admin/navs/index');
        } else {
            throw new NotFoundException();
        }
    }
}
