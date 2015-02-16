<?php
class User extends AppModel {
    public $hasOne = array(
		'UserInfo' => array(
			'className' => 'UserInfo',
		),
	);

    public $validate = array(
        'login' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'ПОле не може бути порожнім',
                'required' => true
            ),
            'unique' => array(
                'rule' => 'isUniqueLogin',
                'message' => 'Такий логін вже зареєстрований',
                'required' => true
            )
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Поле не может быть пустым',
                'required' => true
            )
        )
    );

	function beforeSave() {
		$this->data['User']['hash'] = md5(date('YmdHis').microtime());
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
