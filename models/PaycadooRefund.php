<?php

class PaycadooRefund {
	/**
	* @var string	
	**/
	public $id;
	/**
	* @var string	
	**/
	public $status;
	/**
	* @var string	
	**/
	public $reason;
	/**
	* @var string	
	**/
	public $merchantId;
	/**
	* @var string	
	**/
	public $paymentId;
	/**
	* @var integer	
	**/
	public $amount;
	/**
	* @var string	
	**/
	public $orderId;
	/**
	* @param array $array
	* @return self	
	**/
	public static function create($array)
	{
		$model = new self();
		$model->id = $array["id"];
		$model->status = $array["status"];
		$model->reason = $array["reason"];
		$model->merchantId = $array["merchantId"];
		$model->paymentId = $array["paymentId"];
		$model->amount = $array["amount"];
		$model->orderId = $array["orderId"];
		
		return $model;
	}

	/**
	* @param array $array
	* @return self[]	
	**/
	public static function createList($array)
	{
		$list = array();
		foreach ($array as $item) {
			$list[] = self::create($item);
		}
		
		return $list;
	}
}