<?php

class BusinessController extends Controller {
	public function __construct() {}
	
	public function index (){
		$this->page->title = "Businesses - " . APP_NAME;		
		
		$this->page->loadPage("pages/admin/businesses");
		$this->page->render();
	}
	
	
	public function add (){
		$this->page->title = "Businesses - " . APP_NAME;
				
		$this->page->loadPage("pages/admin/businesses/add");
		$this->page->render();
	}
	
	public function create(){
		if(
			empty(Input::post("name")) || 
			empty(Input::post("email")) || 
			empty(Input::post("phone"))
		){
			Alert::set("error", "All fields are requried.");
		}else{
			businesses::insertInto([
				"name"		=> Input::post("name"),
				"email"		=> Input::post("email"),
				"phone"		=> Input::post("phone"),
				"address"	=> Input::post("address")
			]);
			
			Alert::set("success", "Business information has been saved.");
		}
		
		$this->redirect(PORTAL . "admin/businesses/add");
	}
	
	public function edit (){
		$id = Url::get(3);
		
		$this->page->title = "Businesses - " . APP_NAME;
		
		$b = businesses::getBy(["id" => $id]);
		
		if(count($b) > 0){
			$this->page->loadPage("pages/admin/businesses/edit", ["b" => $b[0]]);	
			$this->page->render();
		}else{
			Alert::set("error", "Selected user information is not valid.");
			$this->redirect(PORTAL . "admin/businesses");
		}
	}
	
	public function update (){
		$id = Input::post("business_id");
		$b = businesses::getBy(["id" => $id]);
		
		if(count($b) > 0){
			$data = [
				"name"		=> Input::post("name"),
				"email"		=> Input::post("email"),
				"phone"		=> Input::post("phone"),
				"address"	=> Input::post("address")
			];
			
			businesses::updateBy(["id" => $id], $data);
			
			Alert::set("success", "Business information has been saved.");
			$this->redirect(PORTAL . "admin/businesses/edit/" . $id);
		}else{
			Alert::set("error", "Fail updating sleected business information. No business found.");
			$this->redirect(PORTAL . "admin/businesses");
		}
	}
	
	public function delete (){
		$this->page->title = "Business - " . APP_NAME;
		
		$id = Url::get(3);
		$b = businesses::getBy(["id" => $id]);
		
		if(count($b) > 0){
			$this->page->loadPage("pages/admin/businesses/delete", ["b" => $b[0]]);	
			$this->page->render();
		}else{
			Alert::set("error", "Selected business information is not valid.");
			$this->redirect(PORTAL . "admin/businesses");
		}
	}
	
	public function remove (){
		$id = Input::post("business_id");
		$u = businesses::getBy(["id" => $id]);
		
		if(count($u) > 0){			
			businesses::deleteBy(["id" => $id]);
			
			Alert::set("success", "Business information has been removed.");
			$this->redirect(PORTAL . "admin/businesses");
		}else{
			Alert::set("error", "Fail updating selected business information. No business found.");
			$this->redirect(PORTAL . "admin/businesses");
		}
	}
}
