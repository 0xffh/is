<?php
class Review extends AppModel {
    
    public $validate = array(
		'name' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Це поле не може бути порожнім',
				'required' => true,
			),
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 100-а символів'
			),
		),
		'email' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Це поле не може бути порожнім',
				'required' => true,
			),
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 100-а символів'
			),
            'email' => array(
                'rule' => 'email',
                'message' => 'Введіть коректну e-mail адресу'
            )
		),
		'text' => array(
            'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Це поле не може бути порожнім',
				'required' => true,
			)
		),
    );
}
