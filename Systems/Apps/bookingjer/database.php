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