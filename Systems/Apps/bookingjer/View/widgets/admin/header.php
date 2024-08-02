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

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	<a class="navbar-brand" href="#">Navbar</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
		<?php
			foreach($menus as $k => $m){
				if($current == $k){
					$active = "active";
				}else{
					$active = "";
				}
		?>
			<li class="nav-item <?= $active ?>">
				<a class="nav-link" href="<?= PORTAL ?>admin/<?= $k ?>">
					<span class="<?= $m->icon ?>"></span>
					<?= $m->name ?>
				</a>
			</li>
		<?php
			}
		?>
		</ul>
	</div>
</nav> 

<div class="container pt-3">

