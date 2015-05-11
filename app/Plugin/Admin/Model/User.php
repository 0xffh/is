<?php
class User extends AdminAppModel {
    public $hasOne = array(
		'UserInfo' => array(
			'className' => 'Admin.UserInfo',
			'dependent' => true
		),
	);

    public $validate = array(
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Поле не може бути порожнім',
                'required' => true
            ),
			'between' => array(
				'rule' => array('lengthBetween', 8, 100),
				'message' => 'Значення цього поля повинно бути не менше 8-и і не більше 100-а символів'
			),
        )
    );
}
