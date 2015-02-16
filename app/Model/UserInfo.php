<?php
class UserInfo extends AppModel {
	public $useTable = 'users_information';

	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Это поле не может быть пустим',
				'required' => true,
			),
			'between' => array(
				'rule' => array('lengthBetween', 2, 75),
				'message' => 'Значение этого поля должно быть не меньше 2 и не больше 75 символов'
			)
		),
	);
}