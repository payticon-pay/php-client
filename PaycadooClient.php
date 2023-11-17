<?php
include_once "PaycadooHttpClient.php";
include_once "models/PaycadooCustomer.php";
include_once "models/PaycadooOrderItem.php";
include_once "models/PaycadooOrder.php";
include_once "models/PaycadooRefund.php";
include_once "models/PaycadooSubscriptionItem.php";
include_once "models/PaycadooSubscription.php";
include_once "models/PaycadooOrderWithPaywallUrl.php";
include_once "clients/PaycadooOrderClient.php";
include_once "clients/PaycadooRefundClient.php";
include_once "clients/PaycadooSubscriptionClient.php";

class PaycadooClient {
	/**
	* @var PaycadooOrderClient	
	**/
	public $order;
	/**
	* @var PaycadooRefundClient	
	**/
	public $refund;
	/**
	* @var PaycadooSubscriptionClient	
	**/
	public $subscription;
	/**
	* @param string $apiKey
	* @param string $url	
	**/
	public function __construct($apiKey, $url = "https://pay.payticon.com")
	{
		$httpClient = new PaycadooHttpClient($url, $apiKey);
		$this->order = new PaycadooOrderClient($httpClient);
		$this->refund = new PaycadooRefundClient($httpClient);
		$this->subscription = new PaycadooSubscriptionClient($httpClient);
		
	}
}