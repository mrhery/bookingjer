<?php

class FormHelper {
	static $status = [0 => "Draft", 1 => "Published", 2 => "Disabled"];
	static $paymentType = ["0" => "Partial (any amount)", "1" => "Full"];
	static $paymentApproval = ["0" => "After Approve", "1" => "Before Approve"];
	
	public static function allStatus() {
		return self::$status;
	}
	
	public static function getStatus($id) {
		if(isset(self::$status[$id])){
			return self::$status[$id];
		}else{
			return false;
		}
	}
	
	public static function allPaymentType() {
		return self::$paymentType;
	}
	
	public static function getPaymentType($id) {
		if(isset(self::$paymentType[$id])){
			return self::$paymentType[$id];
		}else{
			return false;
		}
	}
	
	public static function allPaymentApproval() {
		return self::$paymentApproval;
	}
	
	public static function getPaymentApproval($id) {
		if(isset(self::$paymentApproval[$id])){
			return self::$paymentApproval[$id];
		}else{
			return false;
		}
	}
}