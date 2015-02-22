<?php
class MenuItemsController extends AdminAppController {
    public $uses = array('Admin.Menu', 'Admin.MenuItem');
    
    function add($menu_id = false) {
        if($menu_id === false) throw new NotFoundException();
        $menu_id = (int) $menu_id;
        
        $menu = $this->Menu->findById($menu_id);
        if(empty($menu)) throw new NotFoundException();
        
        $lang = $this->MyLanguage->getLanguageByKey($this->getLanguageParam());
        
        if($this->request->is('post')) {
            $this->request->data['MenuItem']['menu_id'] = $menu_id;
            $this->request->data['MenuItem']['language_id'] = $lang['Language']['id'];
            
            if($this->MenuItem->save($this->request->data, true)) {
                $this->Session->setFlash('Пункт меню добавлен', 'flash', array('class' => 'alert-success'));
                $this->clearCache("menu*", "default");
                $this->redirect($this->here);
            } else {
                $this->Session->setFlash('Ошибка. Пункт меню не добавлен', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $other_items = $this->MenuItem->find('all',
            array(                
                'conditions' => array('MenuItem.menu_id' => $menu_id, 'MenuItem.language_id' => $lang['Language']['id']),
            )
        );
        
        $this->set(array(
            'page_title' => 'Добавить пункт меню',
            'other_items' => $other_items,
            'current_nav' => '/menus'
        ));
    }
    
    function edit($id = false) {
        if($id === false) throw new NotFoundException();
        $id = (int) $id;
        
        $lang = $this->MyLanguage->getLanguageByKey($this->getLanguageParam());
        
        $item = $this->MenuItem->findById($id);        
        if(empty($item)) throw new NotFoundException();        
        
        if($this->request->is('post')) {            
            $this->request->data['MenuItem']['language_id'] = $lang['Language']['id'];
            
            $this->MenuItem->id = $id;
            
            if($this->MenuItem->save($this->request->data, true)) {
                $this->Session->setFlash('Пункт обновлен', 'flash', array('class' => 'alert-success'));
                $this->clearCache("menu*", "default");
                $this->redirect($this->here.'?lang='.$this->getLanguageParam());
            } else {
                $this->Session->setFlash('Ошибка. Пункт меню не обневлен', 'flash', array('class' => 'alert-danger'));
            }
        }
        
        $this->set(array(
            'page_title' => 'Редактирование пунтка меню',
            'item' => $item,
            'current_nav' => '/menus'
        ));
    }
    
    function items($menu_id) {
        $lang = $this->MyLanguage->getLanguageByKey($this->getLanguageParam());
        
        $menu = $this->Menu->findById($menu_id);
        
        $items = $this->MenuItem->find('all',
            array(
                'conditions' => array('MenuItem.menu_id' => $menu_id, 'MenuItem.language_id' => $lang['Language']['id']),                
            )
        );
        
        $this->set(array(
            'page_title' => 'Пункты меню',
            'items' => $items,
            'menu' => $menu,
            'current_nav' => '/menus'
        ));
    }
    
    function delete($id) {
        if($this->MenuItem->delete($id)) {
            $this->Session->setFlash('Пункт удален', 'flash', array('class' => 'alert-success'));
            $this->clearCache("menu*", "default");
            $this->redirect('/admin/menus/index');
        } else {
            throw new NotFoundException();
        }
    }
}
