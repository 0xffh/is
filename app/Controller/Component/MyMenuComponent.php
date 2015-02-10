<?php
class MyMenuComponent extends Component {

    function getMenu($key) {
        $this->Menu = ClassRegistry::init('Menu');
        
        $menu = $this->Menu->find('first',
            array(
                'conditions' => array('Menu.key' => $key),
                'contain' => array(
                    'MenuItem' => array(
                        'fields' => array('MenuItem.name', 'MenuItem.url'),
                        'order' => 'MenuItem.position ASC',
                        'conditions' => array('MenuItem.item_id' => null),
                        'SubItem' => array(
                            'fields' => array('SubItem.name', 'SubItem.url', 'SubItem.menu_id'),
                            'order' => 'SubItem.position ASC'
                        )
                    )
                ),
                'cache_options' => array('name' => 'menu_'.$key.'_nav')
            )
        );
        
        $res = "";
        
        if(!empty($menu)) {
            return $menu;
        }
        
        return $res;
    }
}