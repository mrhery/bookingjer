
<div class="row">
	<div class="col-6">
		<label for="enablePayment">
			<input type="checkbox" id="enablePayment" name="enablePayment" /> Enable Payment?
		</label><br />
		
		<div class="payment-detail">
			Amount:
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
	</div>
</div>

<script>
$("#enablePayment").on("change", function(){
	if($(this).is("checked")){
		$(".payment-detail").show();
	}else{
		$(".payment-detail").hide();
	}
});
</script>