<?php
class User extends AdminAppModel {
    public $hasOne = array(
		'UserInfo' => array(
			'className' => 'Admin.UserInfo',
			'dependent' => true
		),
	);

    public $validate = array(
        'login' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Поле не може бути порожнім',
                'required' => true
            ),
			'between' => array(
				'rule' => array('lengthBetween', 3, 100),
				'message' => 'Значення цього поля повинно бути не менше 3-ох і не більше 100-а символів'
			),
			'en' => array(
				'rule' => '/^[a-zA-Z0-9_-]+$/',
				'message' => 'Значення повинно містити тільки цифри та букви латиницею'
			),
            'unique' => array(
                'rule' => 'isUniqueLogin',
                'message' => 'Такий користувач вже зареєстрований',
                'required' => true
            )
        ),
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
	
    function isUniqueLogin() {
        $check = $this->findByLogin($this->data['User']['login'], array('id'));
        return empty($check);
    }
}
