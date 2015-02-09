<?php
class Menu extends AppModel {
    public $hasMany = array(
		'MenuItem' => array(
			'className' => 'MenuItem',
            'foreign_key' => 'menu_id'
		)
	);
}
