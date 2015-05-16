<?php
class News extends AdminAppModel {
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
	
    public $validate = array(
		'title' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Це поле не може бути порожнім',
				'required' => true,
			),
			'between' => array(
				'rule' => array('between', 1, 255),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 255-и символів'
			),
		),
		'description' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Це поле не може бути порожнім',
				'required' => true,
			),
			'between' => array(
				'rule' => array('between', 1, 500),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 500-а символів'
			),
		),
		'slug' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Це поле не може бути порожнім',
				'required' => true,
			),
			'between' => array(
				'rule' => array('between', 1, 255),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 255-и символів'
			),
			'en' => array(
				'rule' => '/^[a-zA-Z0-9_-]+$/',
				'message' => 'Значення повинно містити тільки цифри і символи на латиницю'
			),
			'unique' => array(
				'rule' => 'keyUnique',
				'message' => 'Вже є посилання з таким ім\'ям'
			),
		)
    );
    
    function keyUnique() {
        $slug = $this->data['News']['slug'];		
		
		$f = $this->findBySlug($slug);
		
		if(isset($this->isUpdate)) {		
			if(!empty($f)) {
				if($f['News']['id'] == $this->isUpdate) {
					return true;
				}
			}
		}
		
		return empty($f) ? true : false;	
    }
}
