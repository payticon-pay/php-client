<?php

class PaycadooOrderClient {
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
	* The Create Order endpoint in a payment system is like the architect laying the foundation for a seamless transaction. 
	* This crucial API allows users to initiate a new order, specifying details such as the items being purchased, 
	* the amount, and any additional information needed for processing.
	* Once the order is successfully created, the magic happens—it generates a paywallUrl. 
	* 
	* This special link serves as a gateway, guiding users to the payment interface where they can fulfill their purchase. 
	* It's like a digital usher, ensuring customers reach the right destination effortlessly.
	* 
	* In essence, the Create Order endpoint not only kickstarts the payment process
	* but also hands users the golden ticket in the form of a paywallUrl,
	* paving the way for a smooth and secure payment journey.
	* 
	* @param array{
	*   price: integer,
	*   merchantId: string,
	*   title: string,
	*   currency: "AUD"|"BGN"|"CAD"|"CHF"|"CZK"|"DKK"|"EUR"|"GBP"|"HRK"|"HUF"|"JPY"|"LTL"|"NOK"|"PLN"|"ROL"|"RUR"|"SEK"|"TRL"|"UAH"|"USD",
	*   returnUrl: string,
	*   webhookUrl: string,
	*   customer: array{
	*     id: string,
	*     firstName: string,
	*     lastName: string,
	*     email: string
	*   },
	*   items: list{
	*     array{
	*       name: string,
	*       qty: integer,
	*       price: integer
	*     }
	*   }
	* } $data
	* @return PaycadooOrderWithPaywallUrl
	* @throws Exception	
	**/
	public function create($data)
	{
		return PaycadooOrderWithPaywallUrl::create($this->httpClient->post("/api/v1/orders", $data));
	}

	/**
	* This endpoint allows you to retrieve detailed information about an order based on its unique identifier (ID).
	* To use this endpoint, simply provide the appropriate order ID as a route parameter.
	* 
	* @param string $orderId
	* @return PaycadooOrder
	* @throws Exception	
	**/
	public function getById($orderId)
	{
		return PaycadooOrder::create($this->httpClient->get("/api/v1/orders/$orderId"));
	}

	/**
	* This endpoint allows you to retrieve a list of orders within the payment system.
	*  It provides flexibility through various query parameters to tailor the results according to your needs.
	* 
	* @param array{
	*   limit: integer,
	*   offset: integer,
	*   sort_by: "createdAt"|"amount"|"updatedAt",
	*   order_by: "asc"|"desc"
	* } $options
	* @return PaycadooOrder[]
	* @throws Exception	
	**/
	public function get($options = array())
	{
		return PaycadooOrder::createList($this->httpClient->get("/api/v1/orders", $options));
	}

	/**
	* The "refund order" endpoint allows users to initiate a refund process for a previously completed order.
	* This functionality is crucial for handling customer returns, cancellations, or resolving payment discrepancies.
	*  
	* The endpoint requires specific parameters to be included in the request payload, such as the order ID and refund amount.
	* 
	* @param string $orderId
	* @param array{
	*   amount: integer,
	*   reason: string
	* } $data
	* @return PaycadooRefund[]
	* @throws Exception	
	**/
	public function refund($orderId, $data)
	{
		return PaycadooRefund::createList($this->httpClient->post("/api/v1/orders/$orderId/refund", $data));
	}

	/**
	* The "List Order Refunds" endpoint provides a comprehensive overview of all refunds associated with specific orders within the payment system. 
	* This functionality is crucial for merchants and administrators seeking detailed insights into the refund history of individual transactions..
	* 
	* @param string $orderId
	* @param array{
	*   limit: integer,
	*   offset: integer,
	*   sort_by: "createdAt",
	*   order_by: "asc"|"desc"
	* } $options
	* @return PaycadooRefund[]
	* @throws Exception	
	**/
	public function getRefunds($orderId, $options = array())
	{
		return PaycadooRefund::createList($this->httpClient->get("/api/v1/orders/$orderId/refund", $options));
	}
}