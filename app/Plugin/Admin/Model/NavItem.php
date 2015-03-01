<?php
class NavItem extends AdminAppModel {
    public $useTable = 'menu_items';

    public $hasMany = array(
		'SubItem' => array(
			'className' => 'NavItem',
            'foreignKey' => 'item_id'
		)
	);
	
    public $validate = array(
        'name' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Це поле не може бути порожнім',
				'required' => true,
			),              
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Значення цього поля повинно бути не менше 1-ого та не більше 100-а символів'
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