<?php

class PaycadooRefundClient {
	/**
	* @var PaycadooHttpClient	
	**/
	protected $httpClient;
	/**
	* @param PaycadooHttpClient $httpClient	
	**/
	public function __construct($httpClient)
	{
		$this->httpClient = $httpClient;
	}

	/**
	* This endpoint allows you to retrieve detailed information about an order based on its unique identifier (ID).
	* To use this endpoint, simply provide the appropriate order ID as a route parameter.
	* 
	* @param string $refundId
	* @return PaycadooRefund
	* @throws Exception	
	**/
	public function getById($refundId)
	{
		return PaycadooRefund::create($this->httpClient->get("/api/v1/refunds/$refundId"));
	}
}