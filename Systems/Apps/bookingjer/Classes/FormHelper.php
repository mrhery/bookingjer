<?php

class FormHelper {
	static $status = [0 => "Draft", 1 => "Published", 2 => "Disabled"];
	static $paymentType = ["0" => "Partial (any amount)", "1" => "Full"];
	
	public static function allStatus() {
		return self::$status;
	}
	
	public static getStatus($id) {
		if(isset(self::$status[$id])){
			return self::$status[$id];
		}else{
			return false;
		}
	}
	
	public static function allPaymentType() {
		return self::$paymentType;
	}
	
	public static getPaymentType($id) {
		if(isset(self::$paymentType[$id])){
			return self::$paymentType[$id];
		}else{
			return false;
		}
	}
}