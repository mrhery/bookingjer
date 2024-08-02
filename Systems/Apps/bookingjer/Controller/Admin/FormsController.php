<?php

class FormsController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Forms - " . APP_NAME;
		$this->page->loadPage("pages/admin/forms");
		$this->page->render();
	}
}
