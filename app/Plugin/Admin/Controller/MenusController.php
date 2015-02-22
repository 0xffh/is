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
                $this->Session->setFlash('Меню добавлено', 'flash', array('class' => 'alert-success'));
                $this->clearCache("menu*", "default");
                $this->redirect('/admin/menus/edit/'.$this->Menu->getInsertID());
            } else {
                $this->Session->setFlash('Ошибка. Меню не добавлено', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $menus = $this->Menu->find('all');
        
        $this->set(array(
            'page_title' => 'Добавить меню',
            'menus' => $menus,
            'current_nav' => '/menus'
        ));
    }
    
    function edit($id = false) {
        if($id === false) throw new NotFoundException();
        $id = (int) $id;
        
        $lang = $this->MyLanguage->getLanguageByKey($this->getLanguageParam());
        
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
                $this->Session->setFlash('Меню обновлено', 'flash', array('class' => 'alert-success'));
                $this->clearCache("menu*", "default");
                $this->redirect($this->here);
            } else {
                $this->Session->setFlash('Ошибка. Меню не добавлено', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $this->set(array(
            'page_title' => 'Редактирование меню',
            'menu' => $menu,
            'current_nav' => '/menus'
        ));
    }
    
    function delete($id) {
        if($this->Menu->delete($id)) {
            $this->Session->setFlash('Меню удалено', 'flash', array('class' => 'alert-success'));
            $this->clearCache("menu*", "default");
            $this->redirect('/admin/menus/index');
        } else {
            throw new NotFoundException();
        }
    }
}
