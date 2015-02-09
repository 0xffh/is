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
                        'order' => 'MenuItem.position ASC'
                    )
                ),
                'cache_options' => array('name' => 'menu_main_nav')
            )
        );
        
        $res = "";
        
        if(!empty($menu)) {
            return $menu;
        }
        
        return $res;
    }
}
