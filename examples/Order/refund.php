<?php
/**
* The "refund order" endpoint allows users to initiate a refund process for a previously completed order.
* This functionality is crucial for handling customer returns, cancellations, or resolving payment discrepancies.
*  
* The endpoint requires specific parameters to be included in the request payload, such as the order ID and refund amount.
* 
**/

require_once 'paycadoo-php/PaycadooClient.php';

$client = new PaycadooClient("<YOUR_API_KEY>");
$client->order->refund();