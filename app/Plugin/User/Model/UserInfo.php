<?php
class UserInfo extends UserAppModel {
	public $useTable = 'users_information';

	public $validate = array(
        'email' => array(
			'rule' => 'email',
            'message' => 'Введіть коректну e-mail адресу',
            'allowEmpty' => true
        ),
		'name' => array(
			'between' => array(
				'rule' => array('between', 1, 255),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 255-и символів'
			),
		),
		'post' => array(
			'between' => array(
				'rule' => array('between', 1, 255),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 255-и символів',
				'allowEmpty' => true
			),
		),
		'contact' => array(
			'between' => array(
				'rule' => array('between', 1, 255),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 255-и символів',
				'allowEmpty' => true
			),
		),
	);
}