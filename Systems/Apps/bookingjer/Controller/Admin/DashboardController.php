<?php

class DashboardController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Admin Dashborad - " . APP_NAME;
		$this->page->loadPage("pages/admin/dashoard");
		$this->page->render();
	}
}
