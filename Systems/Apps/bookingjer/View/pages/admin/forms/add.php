<?php
Alert::show();
?>

<div class="card">
	<div class="card-header">
		<a href="<?= PORTAL ?>admin/forms" class="btn btn-sm btn-primary">
			<span class="fa fa-arrow-left"></span> Back
		</a>
		
		Create new Form
	</div>
	
	<div class="card-body">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link link-basic active" data-toggle="tab" href="#basic"><span class="fa fa-edit"></span> Basic</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link link-availability" data-toggle="tab" href="#availability"><span class="fa fa-calendar"></span> Availability</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link link-payment" data-toggle="tab" href="#payment"><span class="fa fa-money"></span> Payment</a>
			</li>
			
		<?php		
			// <li class="nav-item">
				// <a class="nav-link link-form active" data-toggle="tab" href="#form"><span class="fa fa-table"></span> Form</a>
			// </li>
		?>
		
			<li class="nav-item">
				<a class="nav-link link-preview" data-toggle="tab" href="#preview"><span class="fa fa-eye"></span> Preview</a>
			</li>
		</ul>
		
		<br />
		
		<div class="tab-content">
			<div class="tab-pane container-fluid active" id="basic">
			<?php
				Page::Load("pages/admin/forms/add/basic");
			?>
			</div>
			
			<div class="tab-pane container-fluid" id="availability">
			<?php
				Page::Load("pages/admin/forms/add/availability");
			?>
			</div>
			
			<div class="tab-pane container-fluid" id="payment">
			<?php
				Page::Load("pages/admin/forms/add/payment");
			?>
			</div>
			
			<?php			
			// <div class="tab-pane container-fluid active" id="form">
			// <?php
				// Page::Load("pages/admin/forms/add/form2");
			// ? >
			// </div>
			?>
			
			<div class="tab-pane container-fluid" id="preview">
			<?php
				Page::Load("pages/admin/forms/add/preview");
			?>
			</div>
		</div>
	</div>
</div>

<script>
function getFormSetting(){
	var obj = {
		title: $("#title").val(),
		descrtipion: $("#descrtipion").val(),
		formPublic: $("#formPublic").is(":checked"),
		enableBackDated: $("#enableBackDated").is(":checked"),
		multipleDate: $("#multipleDate").is(":checked"),
		dayBefore: parseInt($("#dayBefore").val() == "" ? 0 : $("#quantity").val()),
		quantity: parseInt($("#quantity").val() == "" ? 0 : $("#quantity").val()),
		hasTimeRange: $("#hasTimeRange").val(),
		expiredDatetime: $("#expiredDatetime").val(),
		available_dates: $("#available_dates").val().split(","),
		hasUnavailable: $("#hasUnavailable").val(),
		unavailable_dates: $("#unavailable_dates").val().split(","),
		enablePayment: $("#enablePayment").is(":checked"),
		paymentAmount: $("#paymentAmount").val(),
		paymentType: $("#paymentType").val(),
		requireApproval: $("#requireApproval").val(),
		paymentApproval: $("#paymentApproval").val(),
	};
	
	return obj;
}

$(document).on("click", ".to-basic", function(){
	$(".nav-link[data-toggle=tab]").removeClass("active");
	$(".nav-link.link-basic").addClass("active");
	
	$(".tab-pane").removeClass("active");
	$("#basic").addClass("active");
});

$(document).on("click", ".to-availibility", function(){
	$(".nav-link[data-toggle=tab]").removeClass("active");
	$(".nav-link.link-availability").addClass("active");
	
	$(".tab-pane").removeClass("active");
	$("#availability").addClass("active");
});

$(document).on("click", ".to-payment", function(){
	$(".nav-link[data-toggle=tab]").removeClass("active");
	$(".nav-link.link-payment").addClass("active");
	
	$(".tab-pane").removeClass("active");
	$("#payment").addClass("active");
});

$(document).on("click", ".to-preview", function(){
	$(".nav-link[data-toggle=tab]").removeClass("active");
	$(".nav-link.link-preview").addClass("active");
	
	$(".tab-pane").removeClass("active");
	$("#preview").addClass("active");
});

$('[data-toggle="tooltip"]').tooltip();  
</script>