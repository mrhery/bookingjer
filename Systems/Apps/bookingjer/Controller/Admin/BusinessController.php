<?php

class BusinessController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Businesses - " . APP_NAME;
		$this->page->loadPage("pages/admin/businesses");
		$this->page->render();
	}
}
