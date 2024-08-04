<?php
//A journey start with a step

if(count(users::list()) < 1){
	users::insertInto([
		"name"	=> "hery",
		"phone"	=> "0187824900",
		"email"	=> "hery@herytechnology.com",
		"password"	=> "21b935f64a6a2b9f70876c6a4703cdfeac7ea5a11ab6571075b85ba159ed3b95"
	]);
}

$this->page->addTopTag('
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="'. PORTAL .'assets/vendor/font-awesome/css/font-awesome.min.css" />

<link rel="stylesheet" href="'. PORTAL .'assets/vendor/datatable/dataTables.min.css" />
<script src="'. PORTAL .'assets/vendor/datatable/dataTables.min.js"></script>

<script src="'. PORTAL .'assets/vendor/googlechart.js"></script>
');

Page::append(<<<script
<script>
$(".dataTable").dataTable();
</script>
script
);

if(Session::exist("admin")){
	$this->page->setMainMenu('widgets/admin/header.php');
	$this->page->setFooter('widgets/admin/footer.php');
	
	Route::create([
		"admin|admin/dashboard"			=> "Admin/DashboardController::index",
		
		"admin/businesses"				=> "Admin/BusinessController::index",
		"admin/businesses/add"			=> "Admin/BusinessController::add",
		"admin/businesses/edit:param"	=> "Admin/BusinessController::edit",
		"admin/businesses/delete:param"	=> "Admin/BusinessController::delete",
		
		"admin/users"				=> "Admin/UsersController::index",
		"admin/users/add"			=> "Admin/UsersController::add",
		"admin/users/edit:param"	=> "Admin/UsersController::edit",
		"admin/users/delete:param"	=> "Admin/UsersController::delete",
		
		"admin/forms"				=> "Admin/FormsController::index",
		"admin/forms/add"			=> "Admin/FormsController::add",
		"admin/forms/edit:param"	=> "Admin/FormsController::edit",
		"admin/forms/delete:param"	=> "Admin/FormsController::delete",
		
		"admin/logout"			=> "Admin/LoginController::logout",
	]);
	
	//$this->page->render();
}elseif(Session::exist("business")){	
	Route::create([
		"business"				=> "Business/DashboardController::index",
		"business/info"			=> "Business/BusinessController::index",
		"business/staff"		=> "Business/UsersController::index",
		"business/forms"		=> "Business/FormsController::index",
	]);
}else{
	Route::create([
		""					=> "SiteController::index",
		"about"				=> "SiteController::about",
		"contact"			=> "SiteController::contact",
		"pricing"			=> "SiteController::pricing",
		"form:param"		=> "BookingFormController::public_form",
		"admin/login"		=> "Admin/LoginController::index",
		"business/login"	=> "Business/LoginController::index",
	]);
}
