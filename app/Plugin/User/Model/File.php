<?php
class File extends UserAppModel {

    public $validate = array(
        'title' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Поле не може бути порожнім',
                'required' => true
            ),
			'between' => array(
				'rule' => array('lengthBetween', 3, 255),
				'message' => 'Значення цього поля повинно бути не менше 3-ох і не більше 255-и символів'
			)
        ),
        'info' => array(
			'between' => array(
				'rule' => array('lengthBetween', 1, 500),
				'message' => 'Значення цього поля повинно бути не менше 1-го і не більше 500-а символів',
                'allowEmpty' => true
			)
        )
    );
}
