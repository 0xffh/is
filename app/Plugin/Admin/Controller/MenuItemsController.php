<?php
class MenuItemsController extends AdminAppController {
    public $uses = array('Admin.Menu', 'Admin.MenuItem');
    
    function add($menu_id = false) {
        if($menu_id === false) throw new NotFoundException();
        $menu_id = (int) $menu_id;
        
        $menu = $this->Menu->findById($menu_id);
        if(empty($menu)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->request->data['MenuItem']['menu_id'] = $menu_id;
            
            if($this->MenuItem->save($this->request->data, true)) {
                $this->Session->setFlash('Пункт меню доданий', 'flash', array('class' => 'alert-success'));
                $this->clearCache("menu*", "default");
                $this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Пункт меню не доданий', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $other_items = $this->MenuItem->find('all',
            array(                
                'conditions' => array('MenuItem.menu_id' => $menu_id)
            )
        );
        
        $this->set(array(
            'page_title' => 'Додати пункт меню',
            'other_items' => $other_items,
            'current_nav' => '/menus'
        ));
    }
    
    function edit($id = false) {
        if($id === false) throw new NotFoundException();
        $id = (int) $id;
        
        $item = $this->MenuItem->findById($id);        
        if(empty($item)) throw new NotFoundException();        
        
        if($this->request->is('post')) {                        
            $this->MenuItem->id = $id;
            
            if($this->MenuItem->save($this->request->data, true)) {
                $this->Session->setFlash('Пункт оновлений', 'flash', array('class' => 'alert-success'));
                $this->clearCache("menu*", "default");
                $this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Пункт меню не оновлений', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $this->set(array(
            'page_title' => 'Редагування пункту меню',
            'item' => $item,
            'current_nav' => '/menus'
        ));
    }
    
    function items($menu_id) {        
        $menu = $this->Menu->findById($menu_id);
        
        $items = $this->MenuItem->find('all',
            array(
                'conditions' => array('MenuItem.menu_id' => $menu_id)
            )
        );
        
        $this->set(array(
            'page_title' => 'Пункти меню',
            'items' => $items,
            'menu' => $menu,
            'current_nav' => '/menus'
        ));
    }
    
    function delete($id) {
        if($this->MenuItem->delete($id)) {
            $this->Session->setFlash('Пункт видалений', 'flash', array('class' => 'alert-success'));
            $this->clearCache("menu*", "default");
            $this->redirect('/admin/menus/index');
        } else {
            throw new NotFoundException();
        }
    }
}
