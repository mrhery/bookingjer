<?php

class LoginController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Admin Login - " . APP_NAME;
		$this->page->loadPage("pages/admin/login");
		$this->page->render();
	}
	
	public function login (){
		$pass = F::Hashing(Input::post("password"));
		$u = users::getBy(["email" => Input::post("username"), "password" => $pass]);
		
		if(count($u) > 0){
			Session::create("admin", $u);
			Alert::set("success", "Login success");
			$this->redirect(PORTAL . "admin");
		}else{
			Alert::set("error", "Username or password are incorrect.");
			$this->redirect(PORTAL . "admin/login");
		}
	}
}
