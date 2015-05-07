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
				'message' => 'Это поле не может быть пустим',
				'required' => true,
			),              
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Значение этого поля должно быть не меньше 1-о и не больше 100-а символов'
			) 
        ),
        'key' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Это поле не может быть пустим',
				'required' => true,
			),              
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Значение этого поля должно быть не меньше 1-о и не большое 100-а символов'
			),
			'en' => array(
				'rule' => '/^[a-zA-Z0-9_-]+$/',
				'message' => 'Значение должно содеражть только цифры и символы на латиницу'
			),
			'unique' => array(
				'rule' => 'keyUnique',
				'message' => 'Уже есть ссылка с таким именем'
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
