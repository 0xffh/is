<?php
class MenusController extends AdminAppController {
    public $uses = array('Admin.Menu');
    
    function index() {        
        $menus = $this->Menu->find('all');
        
        $this->set(array(
            'page_title' => 'Меню',
            'menus' => $menus,
            'current_nav' => '/menus'
        ));
    }
    
    function add() {
        if($this->request->is('post')) {
            if($this->Menu->save($this->request->data, true, array('key', 'name'))) {
                $this->Session->setFlash('Меню додано', 'flash', array('class' => 'alert-success'));
                $this->clearCache("menu*", "default");
                $this->redirect('/admin/menus/edit/'.$this->Menu->getInsertID());
            } else {
                $this->Session->setFlash('ПОмилка. Меню не додано', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $menus = $this->Menu->find('all');
        
        $this->set(array(
            'page_title' => 'Додати меню',
            'menus' => $menus,
            'current_nav' => '/menus'
        ));
    }
    
    function edit($id = false) {
        if($id === false) throw new NotFoundException();
        $id = (int) $id;
        
        $menu = $this->Menu->find('first',
            array(
                'conditions' => array('Menu.id' => $id)
            )
        );
        if(empty($menu)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Menu->isUpdate = $id;
            $this->Menu->id = $id;            
            
            if($this->Menu->save($this->request->data, true, array('key', 'name'))) {
                $this->Session->setFlash('Меню оновлено', 'flash', array('class' => 'alert-success'));
                $this->clearCache("menu*", "default");
                $this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Меню не оновлено', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $this->set(array(
            'page_title' => 'Редагування меню',
            'menu' => $menu,
            'current_nav' => '/menus'
        ));
    }
    
    function delete($id) {
        if($this->Menu->delete($id)) {
            $this->Session->setFlash('Меню видалено', 'flash', array('class' => 'alert-success'));
            $this->clearCache("menu*", "default");
            $this->redirect('/admin/menus/index');
        } else {
            throw new NotFoundException();
        }
    }
}
