
<button class="btn btn-warning mb-3" onclick="prepareFormPreview()">
	<span class="fa fa-refresh"></span> Reload Form
</button>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<h4 id="form-title">Form Name</h4>
				<div id="form-description">Descriptions goes here:</div>
				<br /><br />
				
				<div id="form-quantityInfo">
					<strong>Quantity Left:</strong> <span id="form-quantity">100</span>
				</div>
				
				<hr />
			</div>
			
			<div class="col-md-6 mb-2">
				Name:
				<input type="text" class="form-control" name="name" placeholder="Mr / Mrs. John" /><br />
				
				Email:
				<input type="email" class="form-control" name="email" placeholder="john@email.com" /><br />
				
				Phone:
				<input type="text" class="form-control" name="phone" placeholder="+6018299299" /><br />
				
				<div class="card" id="form-payment-detail">
					<div class="card-body">
						Amount (RM):
						<input type="number" step="0.01" id="form-amount" class="form-control" placeholder="0.00" />
					</div>
				</div>
			</div>
			
			<div class="col-md-6 mb-3">
				<div id="booking-calendar"></div>
			</div>
			
			<div class="col-md-12 text-center">
				<button class="btn btn-success">
					<span class="fa fa-rocket"></span> Submit
				</button>
			</div>
		</div>
	</div>
</div>

<div class="mt-5">
	<div class="row">
		<div class="col-6">
			<button type="button" class="btn btn-dark to-payment float-left">
				<span class="fa fa-arrow-left"></span> Back to Payment 
			</button>
		</div>
		
		<div class="col-6 text-right">
			<button type="button" class="btn btn-info save-btn mb-2" data-mode="draft">
				<span class="fa fa-save"></span> Save a Draft
			</button>
			
			<button type="button" class="btn btn-success save-btn mb-2" data-mode="publish">
				<span class="fa fa-save"></span> Save & Publish
			</button>
		</div>
	</div>
</div>

<script>
function prepareFormPreview(){
	let obj = getFormSetting();
	
	console.log(obj);
	
	$("#form-title").text(obj.title);
	$("#form-description").text(obj.description);
	
	if(obj.quantity > 0){
		$("#form-quantityInfo").show();
		$("#form-quantity").text(obj.quantity);
	}
	
	if(obj.enablePayment){
		$("#form-payment-detail").show();
		$("#form-amount").val(obj.paymentAmount);
		
		if(obj.paymentType == "0"){
			$("#form-amount").removeAttr("disabled");
		}else{
			$("#form-amount").attr("disabled", true);
			
			if(obj.requireApproval == "1"){
				if(obj.paymentApproval == "0"){
					$("#form-payment-detail").hide();
				}else{
					$("#form-payment-detail").show();
				}
			}
		}
	}
	
	
	prepareCalendar("#booking-calendar", {
		// month: 7,
		// year: 2024,
		// singleDate: !obj.multipleDate,
		disableBackDated: !obj.enableBackDated,
		// selectStart: 2,
		// disabledDates: ["2024-08-10"],
		// selectedDates: ["2024-08-11"],
		// enabledDates: ["2024-08-08", "2024-08-09", "2024-08-10"],
		// enabledStart: "2024-08-04",
		// enabledEnd: "2024-08-20",
		onSelectDate: function(date, selected_dates){
			// console.log(selected_dates);
			//$("[name=available_dates]").val(selected_dates.join(","));
		}
	});
	
}


</script>