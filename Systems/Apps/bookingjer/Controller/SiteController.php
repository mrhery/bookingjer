<?php

class SiteController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Homepage - " . APP_NAME;
		$this->page->loadPage("pages/public/index");
		$this->page->render();
	}
}
