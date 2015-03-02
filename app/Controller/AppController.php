<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {

    public $components = array(
        'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'login', 'password' => 'password'),
					'passwordHasher' => 'blowfish',
				),
			),
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'logoutRedirect' => '/users/login',
            'loginRedirect' => '/',
        ),
        'MyMenu', 'Session'
    );

    function beforeFilter() {        
        $this->set(array(
			'main_menu' => $this->MyMenu->getMenu('main'),
        ));
    }

    function clearCache($name, $folder) {
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');

		$all_like = mb_substr($name, -1);
		$dir = CACHE.$folder;

		if($all_like == '*') {
			$folder = new Folder($dir);
			$files = $folder->read(false);
			$files = $files[1];

			$name = mb_substr($name, 0, -1);

			if(!empty($files)) {
				foreach($files as $file) {
					if(is_int(strpos($file, $name))) {
						unlink($dir.DS.$file);
					}
				}
			}
		} else {
			$file = new File($dir.DS.$name);
			$file->delete();
		}

		return true;
	}
}
