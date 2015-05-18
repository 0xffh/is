<?php
class Alert extends AdminAppModel {
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
		)
    );
}
