<?php
class MyMenuComponent extends Component {
        
    /**
     *  @param $key string
     *  @param $lang string
     *  @return array|string
     */
    function getMenu($key) {
        $this->Menu = ClassRegistry::init('Menu');
        
        $menu = $this->Menu->find('first',
            array(
                'conditions' => array('Menu.key' => $key),
                'contain' => array(
                    'MenuItem' => array(
                        'fields' => array('MenuItem.name', 'MenuItem.url'),
                        'order' => 'MenuItem.position ASC',
                        'conditions' => array(
                            'AND' => array(
                                'MenuItem.item_id' => null
                            )
                        ),
                        'SubItem' => array(
                            'fields' => array('SubItem.name', 'SubItem.url'),
                            'order' => 'SubItem.position ASC',
                        )
                    )
                ),
            )
        );
        
        $res = "";
        
        if(!empty($menu)) {
            return $menu;
        }
        
        return $res;
    }
}
