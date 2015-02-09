<?php
class MenuItem extends AppModel {
    public $useTable = 'menu_items';
    
    public $hasMany = array(
		'SubItem' => array(
			'className' => 'MenuItem',
            'foreignKey' => 'item_id',
		)
	);	
}