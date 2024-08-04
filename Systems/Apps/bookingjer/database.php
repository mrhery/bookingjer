<?php
//Place you database setup here

/*
//Example:
DB::prep()->table("users", function(Table $table){
	$table->varchar("name")->length(100);
	$table->email("email")->rename("emails");
	$table->phone("phone")->length(5);
	$table->password("password")->drop();
	$table->time("upadateTime");
});

DB::prep()->table("users", function(Table $table){
	$table->drop();
});
*/

DB::prep()->table("users", function(Table $t){
	$t->varchar("name");
	$t->email("email");
	$t->phone("phone");
	$t->password("password");
	$t->time("updated");
	$t->varchar("created");
});

DB::prep()->table("businesses", function(Table $t){
	$t->varchar("name");
	$t->email("email");
	$t->phone("phone");
	$t->varchar("address");
	$t->integer("owner");
	$t->integer("user");
	$t->time("updated");
	$t->varchar("created");
});

DB::prep()->table("forms", function(Table $t){
	$t->varchar("title");
	$t->varchar("description");
	$t->integer("owner");
	$t->integer("user");
	$t->integer("status");
	$t->integer("isPublic");
	//$t->varchar("quantityType")->length(15); // once, multiple, quantity 
	$t->integer("quantity"); // 0 - unlimited, 1 - once or any value
	$t->integer("enablePayment");	
	$t->integer("paymentType"); // 0 - partial, 2 - full	
	$t->double("paymentAmount"); // 0 for any amount
	$t->double("paymentAfterApprove"); // 0 for any amount
	$t->integer("hasTimeRange");
	$t->datetime("startDatetime");
	$t->datetime("expiredDatetime");
	$t->integer("requireApproval");
	$t->time("updated");
	$t->varchar("created");
});