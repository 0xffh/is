<?php
class PagesController extends AdminAppController {
    public function index() {
		$this->set(array(
            'page_title' => 'Панель адміністратора'
		));
    }
}