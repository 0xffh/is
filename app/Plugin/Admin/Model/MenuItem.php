<?php
class MenuItem extends AdminAppModel {
    public $useTable = 'menu_items';
    
    public $hasMany = array(
		'SubItem' => array(
			'className' => 'Admin.MenuItem',
            'foreignKey' => 'item_id',
		),
		'SubSubItem' => array(
			'className' => 'Admin.MenuItem',
            'foreignKey' => 'item_id',
		)
	);	
	
	/*public $belongsTo = array(
		'Menu' => array(
			'className' => 'Admin.Menu',
            'foreignKey' => 'menu_id',
		)
	);*/
    
    public $validate = array(
        'name' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Поле не може бути порожнім',
				'required' => true,
			),              
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 100-а симвлів'
			) 
        ),
        'url' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Це поле не може бути порожнім',
				'required' => true,
			)			
        )
    );
}