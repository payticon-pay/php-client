<?php

class PaycadooOrder {
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
	public $merchantId;
	/**
	* @var string	
	**/
	public $webhookUrl;
	/**
	* @var string	
	**/
	public $createdAt;
	/**
	* @var string	
	**/
	public $updatedAt;
	/**
	* @var integer	
	**/
	public $price;
	/**
	* @var string	
	**/
	public $currency;
	/**
	* @var object	
	**/
	public $customer;
	/**
	* @var string	
	**/
	public $title;
	/**
	* @var array	
	**/
	public $items;
	/**
	* @param array $array
	* @return self	
	**/
	public static function create($array)
	{
		$model = new self();
		$model->id = $array["id"];
		$model->status = $array["status"];
		$model->merchantId = $array["merchantId"];
		$model->webhookUrl = $array["webhookUrl"];
		$model->createdAt = $array["createdAt"];
		$model->updatedAt = $array["updatedAt"];
		$model->price = $array["price"];
		$model->currency = $array["currency"];
		$model->customer = PaycadooCustomer::create($array["customer"]);
		$model->title = $array["title"];
		$model->items = PaycadooOrderItem::createList($array["items"]);
		
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