<?php
class Nav extends AdminAppModel {
	public $useTable = 'menus';
	
	public $hasMany = array(
		'MenuItem' => array(
			'className' => 'Admin.NavItem',
            'foreign_key' => 'menu_id'
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
        'key' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Це поле не може бути порожнім',
				'required' => true,
			),              
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Значення цього поля повинно бути не менше 1-ого та не більше 100-а символів'
			),
			'en' => array(
				'rule' => '/^[a-zA-Z0-9_-]+$/',
				'message' => 'Значення повинно містити тільки цифри і символи на латиниці'
			),
			'unique' => array(
				'rule' => 'keyUnique',
				'message' => 'Вже є посилання з таким ім’ям'
			) 
        )
    );
    
    function keyUnique() {
        $key = $this->data['Nav']['key'];		
		
		$f = $this->findByKey($key);
		
		if(isset($this->isUpdate)) {		
			if(!empty($f)) {
				if($f['Nav']['id'] == $this->isUpdate) {
					return true;
				}
			}
		}
		
		return empty($f) ? true : false;	
    }
}
