<?php

class FormsController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Forms - " . APP_NAME;
		$this->page->loadPage("pages/admin/forms");
		$this->page->render();
	}
	
	public function add(){
		$this->page->title = "Add new Form - " . APP_NAME;
		$this->page->loadPage("pages/admin/forms/add");
		$this->page->render();
	}
	
	public function edit(){
		$this->page->title = "Edit Form - " . APP_NAME;
		$this->page->loadPage("pages/admin/forms/edit");
		$this->page->render();
	}
	
	public function delete(){
		$this->page->title = "Edit Form - " . APP_NAME;
		$this->page->loadPage("pages/admin/forms/edit");
		$this->page->render();
	}
}
