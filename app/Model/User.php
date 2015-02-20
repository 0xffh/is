<?php
class User extends AppModel {
    public $hasOne = array(
		'UserInfo' => array(
			'className' => 'UserInfo',
			'foreignKey' => 'user_id',
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
				'rule' => array('between', 8, 40),
				'message' => 'Значення цього поля повинно бути не менше 8-и та не більше 40-а символів'
			),
        )
    );

	function beforeSave() {
		$this->data['User']['hash_id'] = md5(date('YmdHis').microtime().rand(1, 1000));
		$this->data['User']['role'] = 'guest';
		return true;		
	}	
	
    function isUniqueLogin() {
        $check = $this->findByLogin($this->data['User']['login'], array('id'));
        return empty($check);
    }

    function bindResendPassword() {
        $this->bindModel(
            array('belongsTo' => array(
                    'ResendPassword' => array(
                        'className' => 'UserResendPassword',
                        'foreignKey' => 'id'
                    )
                )
            )
        );
    }
}