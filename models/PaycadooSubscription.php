<?php

class PaycadooSubscription {
	/**
	* @var string	
	**/
	public $id;
	/**
	* @var string	
	**/
	public $title;
	/**
	* @var string	
	**/
	public $customerId;
	/**
	* @var boolean	
	**/
	public $isActive;
	/**
	* @var string	
	**/
	public $lastBillingDate;
	/**
	* @var string	
	**/
	public $currentBillingDate;
	/**
	* @var string	
	**/
	public $interval;
	/**
	* @var string	
	**/
	public $webhookUrl;
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
		$model->title = $array["title"];
		$model->customerId = $array["customerId"];
		$model->isActive = $array["isActive"];
		$model->lastBillingDate = $array["lastBillingDate"];
		$model->currentBillingDate = $array["currentBillingDate"];
		$model->interval = $array["interval"];
		$model->webhookUrl = $array["webhookUrl"];
		$model->items = PaycadooSubscriptionItem::createList($array["items"]);
		
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