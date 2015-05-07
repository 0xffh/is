<?php
class Menu extends AdminAppModel {
	
	public $hasMany = array(
		'MenuItem' => array(
			'className' => 'Admin.MenuItem',
            'foreign_key' => 'menu_id'
		)
	);
	
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
        'key' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Поле не може бути порожнім',
				'required' => true,
			),              
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 100-а симвлів'
			),
			'en' => array(
				'rule' => '/^[a-zA-Z0-9_-]+$/',
				'message' => 'Значення цього поля повинно містити тільки цифри та букви латиницею'
			),
			'unique' => array(
				'rule' => 'keyUnique',
				'message' => 'Вже є посилання з таким ім\'ям'
			) 
        )
    );
    
    function keyUnique() {
        $key = $this->data['Menu']['key'];		
		
		$f = $this->findByKey($key);
		
		if(isset($this->isUpdate)) {		
			if(!empty($f)) {
				if($f['Menu']['id'] == $this->isUpdate) {
					return true;
				}
			}
		}
		
		return empty($f) ? true : false;	
    }
}
