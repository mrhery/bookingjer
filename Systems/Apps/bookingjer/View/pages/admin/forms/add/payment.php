
<div class="row">
	<div class="col-6">
		<label for="enablePayment">
			<input type="checkbox" id="enablePayment" name="enablePayment" /> Enable Payment?
		</label><br />
		
		<div class="payment-detail">
			Amount (RM):
			<input type="text" class="form-control" id="paymentAmount" name="paymentAmount" placeholder="0.00" /><br />
			
			Payment Type:
			<select class="form-control" id="paymentType" name="paymentType">
			<?php
				foreach(FormHelper::allPaymentType() as $k => $t){
				?>
				<option value="<?= $k ?>"><?= $t ?></option>
				<?php
				}
			?>
			</select>
		</div>
	</div>

	<div class="col-6">	
		Require Approval?
		<select class="form-control" id="requireApproval" name="requireApproval">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select><br />
		
		<div class="approval-detail">
			Payment Term:
			<select class="form-control" id="paymentApproval" name="paymentApproval">
			<?php
				foreach(FormHelper::allPaymentApproval() as $k => $t){
				?>
				<option value="<?= $k ?>"><?= $t ?></option>
				<?php
				}
			?>
			</select>
		</div>
	</div>
</div>

<div class="mt-5">
	<div class="row">
		<div class="col-6">
			<button type="button" class="btn btn-dark to-availibility float-left">
				<span class="fa fa-arrow-left"></span> Back to Availability 
			</button>
		</div>
		
		<div class="col-6 text-right">	
			<button type="button" class="btn btn-dark to-preview float-right">
				<span class="fa fa-eye"></span> Preview
			</button>
		</div>
	</div>
</div>

<script>
let payment_enabled = false;
let required_approval = false;
let payment_approval = 0;

$(".payment-detail").hide();
$(".approval-detail").hide();

$("#enablePayment").on("change", function(){
	if($(this).is(":checked")){
		$(".payment-detail").show();
		payment_enabled = true;
		
		if(required_approval){
			$(".approval-detail").show();
		}else{
			$(".approval-detail").hide();
		}
	}else{
		$(".payment-detail").hide();
		$(".approval-detail").hide();
		payment_enabled = false;
	}
});

$("[name=requireApproval]").on("change", function(){
	if($(this).val() == "1"){
		required_approval = true;
		
		if(payment_enabled){
			$(".approval-detail").show();
		}else{
			$(".approval-detail").hide();
		}
	}else{
		$(".approval-detail").hide();
		required_approval = false;
	}
});

$("[name=paymentApproval]").on("change", function(){
	if($(this).val() == "1"){
		payment_approval = 1;
	}else{
		payment_approval = 0;
	}
});
</script>