<?php
class NavItemsController extends AdminAppController {
    public $uses = array('Admin.Nav', 'Admin.NavItem');

    function add($nav_id = false) {
        if($nav_id === false) throw new NotFoundException();
        $nav_id = (int) $nav_id;

        $nav = $this->Nav->findById($nav_id);
        if(empty($nav)) throw new NotFoundException();

        if($this->request->is('post')) {
            $this->request->data['NavItem']['menu_id'] = $nav_id;

            if($this->NavItem->save($this->request->data, true)) {
                $this->Session->setFlash('Пункт меню доданий', 'flash', array('class' => 'alert-success'));
                $this->clearCache("nav*", "default");
                $this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Пункт меню не доданий', 'flash', array('class' => 'alert-danger'));
            }
        }

        $other_items = $this->NavItem->find('all',
            array(
                'conditions' => array(
                    'NavItem.menu_id' => $nav_id,
                    'NavItem.item_id' => null
                ),
                'contain' => array('SubItem'),
            )
        );


        $other_items_list = array(null => "Не є підпунктом меню");
        $other_items_list[] = $this->NavItem->find('list',
            array(
                'conditions' => array(
                    'NavItem.menu_id' => $nav_id,
                    'NavItem.item_id' => null
                )
            )
        );

        $this->set(array(
            'page_title' => 'Додати пункт меню',
            'other_items' => $other_items,
            'other_items_list' => $other_items_list,
            'current_nav' => '/navs'
        ));
    }

    function edit($id = false) {
        if($id === false) throw new NotFoundException();
        $id = (int) $id;

        $item = $this->NavItem->findById($id);
        if(empty($item)) throw new NotFoundException();

        if($this->request->is('post')) {
            $this->NavItem->id = $id;

            if($this->NavItem->save($this->request->data, true)) {
                $this->Session->setFlash('Пункт меню оновлений', 'flash', array('class' => 'alert-success'));
                $this->clearCache("nav*", "default");
                $this->redirect($this->here);
            } else {
                $this->Session->setFlash('Помилка. Пункт меню не оновлений', 'flash', array('class' => 'alert-danger'));
            }
        }

        $other_items_list = array(null => "Не є підпунктом меню");
        $other_items_list[] = $this->NavItem->find('list',
            array(
                'conditions' => array(
                    'NavItem.menu_id' => $item['NavItem']['menu_id'],
                    'NavItem.item_id' => null,
                    'NavItem.id !=' => $id,
                )
            )
        );

        $this->set(array(
            'page_title' => 'Редагування пунтку меню',
            'other_items_list' => $other_items_list,
            'item' => $item,
            'current_nav' => '/navs'
        ));
    }

    function items($nav_id) {
        $nav = $this->Nav->findById($nav_id);

        $items = $this->NavItem->find('all',
            array(
                'conditions' => array(
                    'NavItem.menu_id' => $nav_id,
                    'NavItem.item_id' => null
                )
            )
        );

        $this->set(array(
            'page_title' => 'Пункти меню',
            'items' => $items,
            'nav' => $nav,
            'current_nav' => '/navs'
        ));
    }

    function delete($id) {
        if($this->NavItem->delete($id)) {
            $this->Session->setFlash('Пункт видалений', 'flash', array('class' => 'alert-success'));
            $this->clearCache("nav*", "default");
            $this->redirect('/admin/navs/index');
        } else {
            throw new NotFoundException();
        }
    }
}
