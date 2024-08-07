<?php
$menus = [
	"dashboard"		=> (object)[
		"name"		=> "Dashboard",
		"icon"		=> "fa fa-dashboard"
	],
	"businesses"	=> (object)[
		"name"		=> "Businesses",
		"icon"		=> "fa fa-building"
	],
	"users"			=> (object)[
		"name"		=> "Users",
		"icon"		=> "fa fa-users"
	],
	"forms"			=> (object)[
		"name"		=> "Forms",
		"icon"		=> "fa fa-file-o"
	],
];

$current = Url::get(1);

if(empty($current)){
	$current = "dashboard";
}

?>

<nav class="navbar navbar-expand-md bg-light navbar-light shadow sticky-top">
	<a class="navbar-brand" href="<?= PORTAL ?>admin">Jer</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav mr-auto">
		<?php
			foreach($menus as $k => $m){
				if($current == $k){
					$active = "text-primary";
				}else{
					$active = "";
				}
		?>
			<li class="nav-item ">
				<a class="nav-link <?= $active ?>" href="<?= PORTAL ?>admin/<?= $k ?>">
					<span class="<?= $m->icon ?>"></span>
					<?= $m->name ?>
				</a>
			</li>
		<?php
			}
		?>
		</ul>
		
		<ul class="navbar-nav my-2 my-lg-0">
			<li class="nav-item">
				<a class="nav-link" href="<?= PORTAL ?>admin/logout">
					<span class="fa fa-sign-out"></span>
					Logout
				</a>
			</li>
		</ul>
	</div>
</nav> 

<div class="container pt-3 pb-5">

