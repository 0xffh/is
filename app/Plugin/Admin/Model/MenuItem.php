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
				'message' => 'Это поле не может быть пустим',
				'required' => true,
			),              
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Значение этого поля должно быть не меньше 1-о и не больше 100-а символов'
			) 
        ),
        'url' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Это поле не может быть пустим',
				'required' => true,
			)			
        )
    );
}