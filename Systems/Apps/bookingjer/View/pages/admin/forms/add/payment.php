
<div class="row">
	<div class="col-6">
		<label for="enablePayment">
			<input type="checkbox" id="enablePayment" name="enablePayment" /> Enable Payment?
		</label><br />
		
		<div class="payment-detail">
			Amount (RM):
			<input type="text" class="form-control" name="paymentAmount" placeholder="0.00" /><br />
			
			Payment Type:
			<select class="form-control" name="paymentType">
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
		<select class="form-control" name="requireApproval">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select><br />
		
		<div class="approval-detail">
			Payment Term:
			<select class="form-control" name="paymentApproval">
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
	<button type="button" class="btn btn-dark to-basic float-left">
		<span class="fa fa-arrow-left"></span> Back to Availability 
	</button>
	
	
	<button type="button" class="btn btn-success save-btn float-right" data-mode="publish">
		<span class="fa fa-save"></span> Save & Publish
	</button>
	
	<button type="button" class="btn btn-info save-btn float-right mr-3" data-mode="draft">
		<span class="fa fa-save"></span> Save a Draft
	</button>
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