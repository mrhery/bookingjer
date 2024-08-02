<?php

class UsersController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Users - " . APP_NAME;
		
		$users = users::list();
		
		$this->page->loadPage("pages/admin/users", ["users" => $users]);	
		$this->page->render();
	}
	
	public function add(){
		$this->page->title = "Users - " . APP_NAME;
		
		$this->page->loadPage("pages/admin/users/add");	
		$this->page->render();
	}
	
	public function create () {
		if(
			empty(Input::post("name")) || 
			empty(Input::post("email")) || 
			empty(Input::post("phone")) || 
			empty(Input::post("password"))
		){
			Alert::set("error", "All fields are requried.");
		}else{
			users::insertInto([
				"name"		=> Input::post("name"),
				"email"		=> Input::post("email"),
				"phone"		=> Input::post("phone"),
				"password"	=> F::Hashing(Input::post("password"))
			]);
			
			Alert::set("success", "User information has been saved.");
		}
		
		$this->redirect(PORTAL . "admin/users/add");
	}
	
	public function edit (){
		$id = Url::get(3);
		
		$this->page->title = "Users - " . APP_NAME;
		
		$u = users::getBy(["id" => $id]);
		
		if(count($u) > 0){
			$this->page->loadPage("pages/admin/users/edit", ["u" => $u[0]]);	
			$this->page->render();
		}else{
			Alert::set("error", "Selected user information is not valid.");
			$this->redirect(PORTAL . "admin/users");
		}
	}
	
	public function update (){
		$id = Input::post("user_id");
		$u = users::getBy(["id" => $id]);
		
		if(count($u) > 0){
			$data = [
				"name"		=> Input::post("name"),
				"email"		=> Input::post("email"),
				"phone"		=> Input::post("phone")
			];
			
			if(!empty(Input::post("password"))){
				$data["password"] = F::Hashing(Input::post("password"));
			}
			
			users::updateBy(["id" => $id], $data);
			
			Alert::set("success", "User information has been saved.");
			$this->redirect(PORTAL . "admin/users/edit/" . $id);
		}else{
			Alert::set("error", "Fail updating sleected user information. No user found.");
			$this->redirect(PORTAL . "admin/users");
		}
	}
	
	public function delete (){
		$this->page->title = "Users - " . APP_NAME;
		
		$id = Url::get(3);
		$u = users::getBy(["id" => $id]);
		
		if(count($u) > 0){
			$this->page->loadPage("pages/admin/users/delete", ["u" => $u[0]]);	
			$this->page->render();
		}else{
			Alert::set("error", "Selected user information is not valid.");
			$this->redirect(PORTAL . "admin/users");
		}
	}
	
	public function remove(){
		$id = Input::post("user_id");
		$u = users::getBy(["id" => $id]);
		
		if(count($u) > 0){			
			users::deleteBy(["id" => $id]);
			
			Alert::set("success", "User information has been saved.");
			$this->redirect(PORTAL . "admin/users");
		}else{
			Alert::set("error", "Fail updating sleected user information. No user found.");
			$this->redirect(PORTAL . "admin/users");
		}
	}
}
